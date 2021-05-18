<?php

namespace App\Controller;

use App\Entity\CalculationLog;
use App\Form\CalculatorForm;
use App\Repository\CalculationLogRepository;
use App\Service\CalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class CalculatorController extends AbstractController
{
    private CalculationLogRepository $repository;
    private CalculatorService $calculator;

    public function __construct(CalculationLogRepository $calculationLogRepository, CalculatorService $calculator)
    {
        $this->repository = $calculationLogRepository;
        $this->calculator = $calculator;
    }

    /**
     * @Route("/", name="calculation_log_index", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $calculationLogs = $this->repository
            ->findBy([],['id' => 'DESC'], 10);


        $calculationLog = new CalculationLog();
        $form = $this->createForm(CalculatorForm::class, $calculationLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($calculationLog);

            $this->calculator->getResult($form, $calculationLog);
            $entityManager->flush();

            return $this->redirectToRoute('calculation_log_index');
        }

        return $this->render('calculator/index.html.twig', [
            'calculation_logs' => $calculationLogs,
            'form' => $form->createView(),
        ]);
    }
}
