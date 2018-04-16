<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Directeur;
use AppBundle\Entity\Domaine;
use AppBundle\Entity\Organisme;
use AppBundle\Entity\Partenaire;
use AppBundle\Entity\President;
use AppBundle\Form\OrganismeType;
use AppBundle\Form\PartenaireType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('Home/home.html.twig');
    }


    /**
     * @Route("/organisme/creer", name="creerOrganisme")
     */

    public function creerOrganismeAction(Request $request){

        $organisme = new Organisme();
        $form = $this->get('form.factory')->create(OrganismeType::class, $organisme);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {


            $organisme->setFormJuridique($request->get('forme_juridique'));
            $organisme->setDateCreation($request->get('dateCreation'));
            $organisme->setDateEnr($request->get('dateEnr'));
            $organisme->setAnneeAdh($request->get('anneeAdh'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($organisme);
            $em->flush();


            $request->getSession()->getFlashBag()->add('create_org', 'Organisme cree avec succes');

            return $this->redirectToRoute('creerOrganisme');

        }

        return $this->render('Organisme/creer.html.twig',array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/organisme/gerer", name="gererOrganisme")
     */

    public function gererOrganismeAction(){

        return $this->render('Organisme/gerer.html.twig');
    }

    protected function serialize($data)
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        return $serializer->serialize($data, 'json');
    }

    /**
     * @Route("/organistion/load", name="loadOrganisation")
     */

    public function loadOrganisationAction(Request $request){

        $json_data = $request->getContent();
        $data = json_decode($json_data,true);


        if ($data == 2){
            $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Organisme');
            $organisme = $repository->findAll();
        }else{
            $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Organisme');
            $organisme = $repository->findBy([
                'formJuridique' => intval($data)
            ]);
        }

        if ($organisme != null){

            $org_array = [];
            foreach ($organisme as $org){
                array_push($org_array,$org);
            }
            return new Response($this->serialize($org_array));

        }else{
            return new JsonResponse(1,200);
        }

    }


    /**
     * @Route("/organistion/delete", name="deleteOrganisation")
     */

    public function deleteOrganisationAction(Request $request){

        $json_data = $request->getContent();
        $data = json_decode($json_data,true);

        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Organisme');
        $organisme = $repository->find(intval($data));

        if ($organisme != null){
            $em = $this->getDoctrine()->getManager();
            $em->remove($organisme);
            $em->flush();
            return new Response(0,200);
        }else{
            return new Response(1,200);
        }

    }


    /**
     * @Route("/organistion/modify", name="modifyOrganisation")
     */

    public function modifyOrganisationAction(Request $request){
        $jsondata = $request->getContent();
        $data = json_decode($jsondata,true);

        $id = $data["id"];

        $em = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Organisme');
        $organisme = $repository->find(intval($id));

        if ($organisme != null){

            if ($data["adresseOrg"] != null){
                $organisme->setAdresseOrg($data["adresseOrg"]);
            }
            if ($data["anneeAdh"] != null){
                $organisme->setAnneeAdh($data["anneeAdh"]);
            }
            if ($data["dateCreation"] != null){
                $organisme->setDateCreation($data["dateCreation"]);
            }
            if ($data["dateEnr"] != null){
                $organisme->setDateEnr($data["dateEnr"]);
            }
            if ($data["formJuridique"] != null){
                $organisme->setFormJuridique($data["formJuridique"]);
            }
            if ($data["lieuCreation"] != null){
                $organisme->setLieuCreation($data["lieuCreation"]);
            }
            if ($data["missionOrg"] != null){
                $organisme->setMissionOrg($data["missionOrg"]);
            }
            if ($data["nom"] != null){
                $organisme->setNom($data["nom"]);
            }
            if ($data["numAdh"] != null){
                $organisme->setNumAdh($data["numAdh"]);
            }
            if ($data["numeroEnr"] != null){
                $organisme->setNumeroEnr($data["numeroEnr"]);
            }
            if ($data["objectifOrg"] != null){
                $organisme->setObjectifOrg($data["objectifOrg"]);
            }
            if ($data["paysEnr"] != null){
                $organisme->setPaysEnr($data["paysEnr"]);
            }
            if ($data["sigle"] != null){
                $organisme->setSigle($data["sigle"]);
            }
            if ($data["typeOrg"] != null){
                $organisme->setTypeOrg($data["typeOrg"]);
            }
            if ($data["villeEnr"] != null){
                $organisme->setVilleEnr($data["villeEnr"]);
            }

            $rep = $this->getDoctrine()->getManager()->getRepository('AppBundle:Domaine');
            $domaine = $rep->find($data["domaine"]["id"]);

            if ($domaine !=null){

                if ($data["domaine"]["domainePri"] != null){
                    $domaine->setDomainePri($data["domaine"]["domainePri"]);
                }
                if ($data["domaine"]["domaineSec"] != null){
                    $domaine->setDomainePri($data["domaine"]["domaineSec"]);
                }
                $em->persist($domaine);

            }

            $rep = $this->getDoctrine()->getManager()->getRepository('AppBundle:Directeur');
            $directeur = $rep->find($data["directeur"]["id"]);

            if ($directeur != null){

                if ($data["directeur"]["nomDir"] != null){
                    $directeur->setNomDir($data["directeur"]["nomDir"]);
                }
                if ($data["directeur"]["prenomDir"] != null){
                    $directeur->setPrenomDir($data["directeur"]["prenomDir"]);
                }
                if ($data["directeur"]["adrDir"] != null){
                    $directeur->setAdrDir($data["directeur"]["adrDir"]);
                }
                $em->persist($directeur);

            }

            $rep = $this->getDoctrine()->getManager()->getRepository('AppBundle:President');
            $president = $rep->find($data["president"]["id"]);

            if ($president != null){
                if ($data["president"]["nomPre"] != null){
                    $president->setNomPre($data["president"]["nomPre"]);
                }
                if ($data["president"]["adrPre"] != null){
                    $president->setAdrPre($data["president"]["adrPre"]);
                }
                if ($data["president"]["prenomPre"] != null){
                    $president->setPrenomPre($data["president"]["prenomPre"]);
                }
                $em->persist($president);
            }

            $em->persist($organisme);

            $em->flush();


            return new Response(0,200);


        }else{
            return new Response(1,200);
        }

    }

    /**
     * @Route("/partenaire/ajouter", name="ajouterPartenaire")
     */

    public function ajouterPartenaireAction(Request $request){

        $partenaire = new Partenaire();
        $form = $this->get('form.factory')->create(PartenaireType::class, $partenaire);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($partenaire);
            $em->flush();


            $request->getSession()->getFlashBag()->add('create_part', 'Partenaire cree avec succes');

            return $this->redirectToRoute('ajouterPartenaire');

        }

        return $this->render('Partenaire/creer.html.twig',array(
            'form' => $form->createView(),
        ));

    }


    /**
     * @Route("/partenaire/gerer", name="gererPartenaire")
     */

    public function gererPartenaireAction(){

        return $this->render('Partenaire/gerer.html.twig');
    }


    /**
     * @Route("/partenaire/get", name="getPartenaire")
     */

    public function getPartenaireAction(){
        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Partenaire');
        $partenaires = $repository->findAll();
        if ($partenaires != null){
            $tab = [];
            foreach ($partenaires as $part){
                array_push($tab,$part);
            }
            return new Response($this->serialize($tab));
        }else{
            return new Response(0,200);
        }
    }

    /**
     * @Route("/partenaire/delete", name="deletePartenaire")
     */

    public function deletePartenaire(Request $request){

        $json_data = $request->getContent();
        $id = json_decode($json_data,true);

        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Partenaire');
        $partenaire = $repository->find($id);

        if ($partenaire != null){

            $em = $this->getDoctrine()->getManager();

            $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Subvention');
            $subvention= $repository->findBy([
                'partenaire' => $partenaire
            ]);
            if ($subvention!=null){
                foreach ($subvention as $subvention_item){
                    $em->remove($subvention_item);
                }
            }
            $em->remove($partenaire);
            $em->flush();
            return new Response(0,200);

        }else{
            return new Response(1,200);
        }

    }

    /**
     * @Route("/partenaire/modifier", name="modifierPartenaire")
     */

    public function modifierPartenaireAction(Request $request){

        $json_data = $request->getContent();
        $data = json_decode($json_data,true);

        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Partenaire');
        $partenaire = $repository->find($data["id"]);

        if ($data["nomPar"] != null){
            $partenaire->setNomPar($data["nomPar"]);
        }
        if ($data["siglePar"] != null){
            $partenaire->setSiglePar($data["siglePar"]);
        }

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        return new Response(0,200);

    }

}