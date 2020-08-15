<?php 

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        /**
         * Busca todos los productos, categorías y marcas
         */
        $products = $this->ProductModel->getProducts();
        $data['categories'] = $this->ProductModel->getCategories();
        $data['brands'] = $this->ProductModel->getBrands();

        /**
         * Si el producto no tiene imagen se le asigna una
         * se cambia el formato de valor
         * se calcula el precio con descuento
         */
        foreach($products as $product){
            $product->price = str_replace(',', '.', $product->price);
            if(!empty($product->discount)){
                $product->lastPrice = number_format($product->price, 0, '.', '.');
                $product->price = $this->calculatePriceWithDiscount($product->price, $product->discount);
            }
            $product->price = number_format($product->price, 0, '.', '.');
            if(empty($product->url_image)){
                $product->url_image = base_url() . "img/noDisponible.png";
            }
        }
        $data['products'] = $products;

        /**
         *Se carga la vista y se envía la data
         */
        $this->layout->view('index', $data);
    }


    private function calculatePriceWithDiscount($price, $discount)
    {
        return $price - (($price * $discount) / 100);
    }
}