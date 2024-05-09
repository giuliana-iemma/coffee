<?php
class Cafe {
        public $id;
        private $nombre;
        public $descripcion;
        public $origen;
        public $tamano;
        public $intensidad;
        public $tipoDeGrano;
        public $imagen;
        public $precio;
    
    
        //Constructor
        public function __construct ($id, $nombre, $descripcion, $origen, $tamano, $intensidad, $tipoDeGrano, $imagen, $precio)
        {
            $this-> id = $id;
            $this -> nombre = $nombre;
            $this -> descripcion = $descripcion;
            $this -> origen = $origen;
            $this -> tamano = $tamano;
            $this -> intensidad = $intensidad;
            $this -> tipoDeGrano = $tipoDeGrano;
            $this -> imagen = $imagen;
            $this -> precio = $precio;
        }
    
        //MÉTODOS
        public static function obtenerCafes (): array
        {
             //Este método devolverá un array compuesto de tantos productos como items existan en el JSON
             $catalogo =[];
    
             //Obtengo el archivo JSON
            $JSON = file_get_contents ('./json/cafe.json');
             //Lo paso a objeto
             $JSONdata = json_decode($JSON); //DUDA: lo hago objeto o array?
    
            foreach ($JSONdata->cafes as $dato) {
                //Creo una instancia nueva de la clase Cafe. Como estoy dentro de la clase, uso new self
               // echo $dato -> nombre;   
                $cafe = new self ($dato->id, $dato->nombre, $dato ->descripcion, $dato ->origen, $dato ->tamano, $dato ->intensidad, $dato ->tipoDeGrano, $dato ->imagen, $dato ->precio); 
    
                $catalogo [] = $cafe;
            }
    
            return $catalogo;
        }
    
            public static function catalogoCafes ()
        {
            //Este método devolverá un array compuesto de tantos productos como items existan en el JSON
    
            $catalogo = self::obtenerCafes();
    
            foreach ($catalogo as $cafe){
                echo '<article class="card">';
                    //detalle.php?id=' . $cafe->id. Esto crea un enlace dinámico que lleva al usuario a la página detalle.php, pasando el ID del producto como parámetro en la URL.
                    echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $cafe->id.'"><span>Ver</span></a>';
                   // echo '<a class="btnDetalle" href="index.php?sec=detalle&id='. $cafe->id .'><span>Ver producto</span></a>';
                    echo '<img src= "'. $cafe->imagen. '">';
                        echo '<div class="info-tarjeta">'; 
                            echo '<h2>' . $cafe->nombre . '</h2>';
    
                            echo '<p class="descripcion">' . $cafe->descripcion . '</p>';
                                echo '<div class="info-extra">'; 
                                    echo '<ul>';
                                    echo '<li>' . '<span>Origen </span>'. $cafe->origen . '</li>';
                                    echo '<li>' . '<span>Tamaño </span>'. $cafe->tamano . '</li>';
                                    echo '<li>' . '<span>Intensidad </span>'. $cafe->intensidad . '</li>';      
                                    echo '<li>' . '<span> Tipo de grano </span>'. $cafe->tipoDeGrano . '</li>';
                                    echo'</ul>';
                                echo '</div>';
    
                            echo '<p class="precio">$ ' . $cafe->precio . '</p>';
                            echo '<button '.'>Añadir al carrito</button>';
                        echo '</div>';
                echo '</article>';
            }
        }
    
        public static function idProducto ()
        {
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
                    echo '<p>Origen: ' . $producto->origen . '</p>';
                    echo '<p>Tamaño: ' . $producto->tamano . '</p>';
                    echo '<p>Intensidad: ' . $producto->intensidad . '</p>';
                    echo '<p>Tipo de Grano: ' . $producto->tipoDeGrano . '</p>';
                    echo '<p>Precio: $' . $producto->precio . '</p>';
                    echo '</div>';
                } else {
                    echo '<p>Producto no encontrado</p>';
                }
            } else {
                echo '<p>Id no válido</p>';
            }
        }
    
        public static function productoX ($id) : ?Cafe 
        {
            //Proveemos como parámetro el id del objeto que identifica al producto.
            //Como tiene dos desenlaces posibles, al declarar el valor que devolverá nuestro método, utilizamos Cafe, pero le agregamos un signo de pregunta al principio (?) indicando que el valor puede ser nulo.d
    
            //Traemos el catálogo completo 
            $catalogo = self::obtenerCafes();
    
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
    

    //GETTER
    public function getNombre(){
        return $this->nombre;
    }

    public function getDescipcion(){
        return $this->descripcion;

    }

    public function getOrigen(){
        return $this->origen;

    }

    public function getTamano(){
        return $this->tamano;

    }

    public function getIntensidad(){
        return $this->intesidad;

    }

    public function getTipoDeGrano(){
        return $this->tipoDeGrano;

    }

    public function getPrecio(){
        return $this->precio;

    }
}

?>
