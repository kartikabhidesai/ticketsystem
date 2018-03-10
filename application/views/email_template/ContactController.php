<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Contact;
use BackendBundle\Entity\ContactList;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Underscore\Types\Arrays;
use Symfony\Component\HttpFoundation\Session\Session;

class ContactController extends Controller
{
    /**
     * @Route("/contact/list",name="contact_list")
     */
    public function indexAction()
    {

        $entityManager = $this->getDoctrine()->getManager();


        if ($this->get('security.authorization_checker')->isGranted('ROLE_CLIENT')) {

            $data['contacts'] = $entityManager->getRepository('BackendBundle:Contact')->findBy(['clientId' => $this->getUser()->getId()], ['surname' => 'ASC']);
            return $this->render('@Backend/Backend/theme1/contact/contactlist.html.twig', $data);
        } else {

            $data['contacts'] = $entityManager->getRepository('BackendBundle:Contact')->findBy([],['surname' =>'ASC']);

            return $this->render('@Backend/Backend/theme1/contact/contactlist.html.twig', $data);
        }


    }


    /**
     * @Route("/contact/edit/{id}",name="contact_edit")
     * @Method({"GET"} )
     */
    public function editAction($id)
    {
        $data['clients']= [];
        $entityManager = $this->getDoctrine()->getManager();
        $clientRepository = $entityManager->getRepository('UserBundle:User');

        $contactRepository = $entityManager->getRepository('BackendBundle:Contact');
        if ($this->get('security.authorization_checker')->isGranted('ROLE_CLIENT')) {
            $contact = $contactRepository->findOneBy(['id' => $id, 'clientId' => $this->getUser()->getId()]);
        }
        else {
            $contact = $contactRepository->findOneBy(['id' => $id]);
            $data['clients'] = $clientRepository->findBy([],['surname'=>'ASC']);
        }

        $data['contact'] = $contact;
        return $this->render('@Backend/Backend/theme1/contact/contactedit.html.twig', $data);
    }

    /**
     * @Route("/contact/edit/{id}",name="contact_save")
     * @Method({"POST"} )
     */
    public function saveAction($id, Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $contactRepository = $entityManager->getRepository('BackendBundle:Contact');
        if ($this->get('security.authorization_checker')->isGranted('ROLE_CLIENT')) {
            $contact = $contactRepository->findOneBy(['id' => $id, 'clientId' => $this->getUser()->getId()]);
        }
        else {
            $contact = $contactRepository->findOneBy(['id' => $id]);
            $contact->setClientId($request->get('client-id'));
        }

        $contact->setName($request->get('name'));
        $contact->setSurname($request->get('surname'));
        $contact->setEmail($request->get('email'));
        $contact->setPhone($request->get('phone'));


        $contactExists= $entityManager->getRepository('BackendBundle:Contact')->findOneBy(['phone' =>$request->get('phone'),'clientId'=>$contact->getClientId() ]);
        {
            if($contact === $contactExists){

                return $this->redirectToRoute('contact_list');
            }
        }
        if($contactExists != null)
        {
            $session = new Session();
            $session->getFlashBag()->set('warning','Bu telefon numarasi kullanimda');

            return $this->redirectToRoute('contact_edit',['id' => $contact->getId()]);
        }
        $entityManager->flush();
        return $this->redirectToRoute('contact_list');
    }


    /**
     * @Route("/contact/create",name="contact_create")
     * @Method({"GET"} )
     */
    public function createAction()
    {
        $data['clients']= [];
        $entityManager = $this->getDoctrine()->getManager();
        $clientRepository = $entityManager->getRepository('UserBundle:User');
        if ($this->get('security.authorization_checker')->isGranted('ROLE_SECRETARY')) {
            $data['clients'] = $clientRepository->findBy([],['surname'=>'ASC']);
        }

        return $this->render('@Backend/Backend/theme1/contact/contactcreate.html.twig',$data);
    }

    /**
     * @Route("/contact/store",name="contact_store")
     * @Method({"POST"} )
     */
    public function storeAction(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $contact = new Contact();
        $contact->setName($request->get('name'));
        $contact->setSurname($request->get('surname'));
        $contact->setEmail($request->get('email'));
        $contact->setPhone($request->get('phone'));



        if ($this->get('security.authorization_checker')->isGranted('ROLE_CLIENT')) {
            $contact->setClientId($this->getUser()->getId());
        }
        else {
            $contact->setClientId($request->get('client-id'));
        }

        $contactExists= $entityManager->getRepository('BackendBundle:Contact')->findOneBy(['phone' =>$request->get('phone'),'clientId'=>$contact->getClientId() ]);
        if($contactExists != null)
        {
            $oldData['name'] = $contact->getName();
            $oldData['surname'] = $contact->getSurname();
            $oldData['email'] = $contact->getEmail();
            $oldData['phone'] = $contact->getPhone();
            $oldData['client'] = $contact->getClientId();
            $session = new Session();
            $session->getFlashBag()->set('warning','Bu telefon numarasi kullanimda');
            $session->getFlashBag()->set('postData',$oldData);
            return $this->redirectToRoute('contact_create');
        }
        $contact->setListId(0);
        $entityManager->persist($contact);
        $entityManager->flush();
        return $this->redirectToRoute('contact_list');
    }


    /**
     * @Route("/contact/delete/{id}",name="contact_delete")
     * @Method({"GET"} )
     */
    public function deleteAction($id, Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $contactRepository = $entityManager->getRepository('BackendBundle:Contact');
        if ($this->get('security.authorization_checker')->isGranted('ROLE_CLIENT')) {
            $contact = $contactRepository->findOneBy(['id' => $id, 'clientId' => $this->getUser()->getId()]);
        }
        else {
            $contact = $contactRepository->findOneBy(['id' => $id]);

        }
        $entityManager->remove($contact);
        $entityManager->flush();


            $session = new Session();
            $session->getFlashBag()->set('warning','Kisi Listenizden Silindi');
            return $this->redirectToRoute('contact_list');



    }
}
