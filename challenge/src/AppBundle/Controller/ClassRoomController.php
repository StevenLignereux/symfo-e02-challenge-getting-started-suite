<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Model\StudentModel;

class ClassRoomController extends Controller
{
    /**
     * Affiche la liste des étudiants
     */
    public function listAction(SessionInterface $session)
    {
        // J'appelle ma méthode de manière statique (sans instanciation)
        $students = StudentModel::getStudents();

        // On récupère notre étudiant
        $lastStudent = $session->get('lastStudent', 'Aucun étudiant vu.');
        // On récupère la date 
        $lastStudentSeen = $session->get('lastStudentSeen', 'Pas de date.');

        return $this->render('classroom/students.html.twig', [
            'students' => $students,
            'lastStudent' => $lastStudent,
            'lastStudentSeen' => $lastStudentSeen,
        ]);
    }

    /**
     * Affiche un étudiant
     */
    public function showAction($id, SessionInterface $session)
    {
        // J'appelle ma méthode de manière statique (sans instanciation)
        $student = StudentModel::getStudentById($id);

        // Non trouvé ? On utilise une 404...
        if (false === $student) {
            throw $this->createNotFoundException('Etudiant non trouvé');
        }

        // On stocke son nom en Session
        $session->set('lastStudent', $student['name']);

        // On stocke la date courante en session
        $session->set('lastStudentSeen', new \DateTime());

        // Juste pour le fun, on ajoute un nombre aléatoire à la session
        $luckyNumber = mt_rand(1, 10);
        $session->set('luckyNumber', $luckyNumber);

        return $this->render('classroom/student.html.twig', [
            'student' => $student,
        ]);
    }

    /**
     * Renvoie un PDF
     */
    public function pdfAction()
    {
        // Va chercher un fichier dans le dossier web, par défait
        return $this->file('pdf/calendrier-2017-turquoise.pdf');
    }

    /**
     * Renvoie un PDF (version alternative)
     */
    public function pdfAltAction()
    {
        // Récupére le ficher pour le manipuler
        $file = new File('pdf/calendrier-2017-turquoise.pdf');

        // Renommer, modifier la façon dont le fichier est téléchargé ou affiché
        return $this->file($file, 'planning-fusion.pdf', ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
