<?php

class Molido {
    public $id;
    public $nombre;
    public $descripcion;
    public $cantidad;
    public $intensidad;
    public $celiacos;
    public $imagen;
    public $precio;


    //Constructor
    public function __construct ($id, $nombre, $descripcion, $cantidad, $intensidad, $celiacos, $imagen, $precio)
    {
        $this-> id = $id;
        $this -> nombre = $nombre;
        $this -> descripcion = $descripcion;
        $this -> cantidad = $cantidad;
        $this -> intensidad = $intensidad;
        $this -> celiacos = $celiacos;
        $this -> imagen = $imagen;
        $this -> precio = $precio;
    }

    //MÉTODOS
    public static function obtenerMolido (): array 
    {
         //Este método devolverá un array compuesto de tantos productos como items existan en el JSON
        $catalogo =[];

         //Obtengo el archivo JSON
        $JSON = file_get_contents ('./json/cafe.json');
         //Lo paso a objeto
         $JSONdata = json_decode($JSON); //DUDA: lo hago objeto o array?

        foreach ($JSONdata->molido as $dato) {
            //Creo una instancia nueva de la clase Cafe. Como estoy dentro de la clase, uso new self
           // echo $dato -> nombre;   
            $molido = new self ($dato->id, $dato->nombre, $dato ->descripcion, $dato ->cantidad, $dato ->intensidad, $dato ->celiacos, $dato ->imagen, $dato ->precio); 

            $catalogo [] = $molido;
        }
        
        return $catalogo;
    }

    public static function catalogoMolido ()
    {
        //Este método devolverá un array compuesto de tantos productos como items existan en el JSON
        $catalogo = self::obtenerMolido();

        foreach ($catalogo as $molido){
            echo '<article class="card">';
                //detalle.php?id=' . $cafe->id. Esto crea un enlace dinámico que lleva al usuario a la página detalle.php, pasando el ID del producto como parámetro en la URL.
                echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $molido->id.'"><span>Ver</span></a>';
               // echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $cafe->id .'><span>Ver producto</span></a>';
                echo '<img src= "'. $molido->imagen. '">';
                    echo '<div class="info-tarjeta">'; 
                        echo '<h2>' . $molido->nombre . '</h2>';

                        echo '<p class="descripcion">' . $molido->descripcion . '</p>';
                            echo '<div class="info-extra">'; 
                                echo '<ul>';
                                echo '<li><span>Cantidad </span>'. $molido->cantidad . '</li>';
                                echo '<li>' . '<span>Intensidad </span>'. $molido->intensidad.'</li>';
                                if ($molido->celiacos == true){
                                    echo '<li class="aptoCeliacos">' . '<span>Apto celíacos</span></li>';
                                } 
                                echo'</ul>';
                            echo '</div>';

                        echo '<p class="precio">$ ' . $molido->precio . '</p>';
                        echo '<button '.'>Añadir al carrito</button>';
                    echo '</div>';
            echo '</article>';
        }
    }

    public static function idProducto (){
        //Verifico si se  pasó un ID en la URL
        if (isset($_GET ['id'])){
            //Si se pas+o, la obtengo
            $idProducto = $_GET ['id'];

            //Obtengo el objeto del producto que tenga ese ID
            $producto = self::productoX($idProducto);

            //Verifico si se encontró un producto con ese ID
            if ($producto !==null) {
                //Si $producto es diferente de null es porque se encontró algo.
                //Entonces muestro los detalles de ese producto
               // echo 'Hay algo';
                echo '<div id="detalle-producto">'; 
                echo '<img src= "'. $producto->imagen. '">'; 
                echo '<h2>' . $producto->nombre . '</h2>';
                echo '<p>' . $producto->descripcion . '</p>';
                echo '<p>Cantidad: ' . $producto->cantidad . '</p>';
                if ($producto->celiacos == true){
                    echo '<p class="aptoCeliacos">' . '<span>Apto celíacos</span></p>';
                }
                echo '<p>Precio: $' . $producto->precio . '</p>';
                echo '</div>';
            } else {
                echo '<p>Producto no encontrado</p>';
            }
        } else {
            echo '<p>Id no válido</p>';
        }
    }

    public static function productoX ($id) : ?Molido {
        //Proveemos como parámetro el id del objeto que identifica al producto.
        //Como tiene dos desenlaces posibles, al declarar el valor que devolverá nuestro método, utilizamos Cafe, pero le agregamos un signo de pregunta al principio (?) indicando que el valor puede ser nulo.d

        //Traemos el catálogo completo 
        $catalogo = self::obtenerMolido();

        //Lo recorremos para encontrar un producto con el id provisto
        foreach ($catalogo as $item){
            if ($item->id == $id){
                //Si lo encuentra, retorna el objeto del producto
                return $item;
            }
        };
        //Si no lo encuentra, retorna null
        return null; 
    }
}

?>