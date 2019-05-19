<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $productRepo = $this->getDoctrine()->getRepository(Product::class);

        $products = $productRepo->findAll();

        return $this->render('product/index.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/product/{id}", name="findById")
     */
    public function find($id)
    {
        $productRepo = $this->getDoctrine()->getRepository(Product::class);

        $product = $productRepo->find($id);

        return $this->render('product/single-product.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/product/create", name="create")
     */
    public function create()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);

        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('Saved new product ' . $product);
    }

    /**
     * @Route("/product/delete/{id}", name="delete")
     */
    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = $entityManager->getRepository(Product::class)->find($id);

        $entityManager->remove($product);
        $entityManager->flush();

        return new Response('Deleted product: ' . $product);
    }
}
