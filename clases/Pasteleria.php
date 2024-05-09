<?php

class Pasteleria {
    public $id;
    public $nombre;
    public $descripcion;
    public $peso;
    public $celiacos;
    public $vegano;
    public $imagen;
    public $precio;


    //Constructor
    public function __construct ($id, $nombre, $descripcion, $peso, $celiacos, $vegano, $imagen, $precio)
    {
        $this-> id = $id;
        $this -> nombre = $nombre;
        $this -> descripcion = $descripcion;
        $this -> peso = $peso;
        $this -> celiacos = $celiacos;
        $this -> vegano = $vegano;
        $this -> imagen = $imagen;
        $this -> precio = $precio;
    }

    //MÉTODOS
    public static function obtenerPasteleria (): array 
    {
         //Este método devolverá un array compuesto de tantos productos como items existan en el JSON
        $catalogo =[];

         //Obtengo el archivo JSON
        $JSON = file_get_contents ('./json/cafe.json');
         //Lo paso a objeto
         $JSONdata = json_decode($JSON); //DUDA: lo hago objeto o array?

        foreach ($JSONdata->pasteleria as $dato) {
            //Creo una instancia nueva de la clase Cafe. Como estoy dentro de la clase, uso new self
           // echo $dato -> nombre;   
            $pasteleria = new self ($dato->id, $dato->nombre, $dato ->descripcion, $dato ->peso, $dato ->celiacos, $dato ->vegano, $dato ->imagen, $dato ->precio); 

            $catalogo [] = $pasteleria;
        }
        
        return $catalogo;
    }

    public static function catalogoPasteleria ()
    {
        //Este método devolverá un array compuesto de tantos productos como items existan en el JSON
        $catalogo = self::obtenerPasteleria();

        foreach ($catalogo as $pasteleria){
            echo '<article class="card">';
                //detalle.php?id=' . $cafe->id. Esto crea un enlace dinámico que lleva al usuario a la página detalle.php, pasando el ID del producto como parámetro en la URL.
                echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $pasteleria->id.'"><span>Ver</span></a>';
               // echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $cafe->id .'><span>Ver producto</span></a>';
                echo '<img src= "'. $pasteleria->imagen. '">';
                    echo '<div class="info-tarjeta">'; 
                        echo '<h2>' . $pasteleria->nombre . '</h2>';

                        echo '<p class="descripcion">' . $pasteleria->descripcion . '</p>';
                            echo '<div class="info-extra">'; 
                                echo '<ul>';
                                echo '<li><span>Peso </span>'. $pasteleria->peso . '</li>';
                                if ($pasteleria->celiacos == true){
                                    echo '<li class="aptoCeliacos">' . '<span>Apto celíacos</span></li>';
                                } 

                                if ($pasteleria->vegano == true){
                                    echo '<li class="vegano">' . '<span>Producto vegano</span></li>';
                                } 
                                echo'</ul>';
                            echo '</div>';

                        echo '<p class="precio">$ ' . $pasteleria->precio . '</p>';
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
                echo '<p>Peso: ' . $producto->peso . '</p>';

                if ($producto->celiacos == true){
                    echo '<p class="aptoCeliacos">' . '<span>Apto celíacos</span></p>';
                } 

                if ($producto->vegano == true){
                    echo '<p class="vegano">' . '<span>Producto vegano</span></p>';
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

    public static function productoX ($id) : ?Pasteleria {
        //Proveemos como parámetro el id del objeto que identifica al producto.
        //Como tiene dos desenlaces posibles, al declarar el valor que devolverá nuestro método, utilizamos Cafe, pero le agregamos un signo de pregunta al principio (?) indicando que el valor puede ser nulo.d

        //Traemos el catálogo completo 
        $catalogo = self::obtenerPasteleria();

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