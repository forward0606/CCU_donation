<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\Type\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

#[Route(path: '/project')]
class ProjectController extends AbstractController
{
    
    #[Route(path: '', name: 'all_project')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $project = new Project();
        $project->setInstitution('中正大學');
        $project->setAvailable(true);

        $form = $this->createForm(ProjectType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($project);
            $entityManager->flush();
            return $this->redirectToRoute('all_project');
        }

        $repository = $entityManager->getRepository(Project::class);
        $projects = $repository->findAll();
        
        return $this->render('project/index.html.twig', [
            'form' => $form,
            'projects' => $projects,
            'edit_id' => 0,
        ]);
    }

    #[Route(path: '/delete/{did}', name: 'project_delete')]
    public function deleteAction(EntityManagerInterface $entityManager, ProjectRepository $projectRepository, int $did): Response
    {
        $project = $projectRepository->find($did);
        $entityManager->remove($project);
        $entityManager->flush();

        return $this->redirectToRoute('all_project');
    }

    #[Route(path: '/edit/{did}', name: 'project_edit')]
    public function editAction(EntityManagerInterface $entityManager, ProjectRepository $projectRepository, int $did, Request $request): Response
    {
        $project = $projectRepository->find($did);

        $form = $this->createForm(ProjectType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($project);
            $entityManager->flush();
            return $this->redirectToRoute('all_project');
        }

        $repository = $entityManager->getRepository(Project::class);
        $projects = $repository->findAll();

        return $this->render('project/index.html.twig', [
            'form' => $form,
            'projects' => $projects,
            'edit_id' => $did,
        ]);

    }
}
