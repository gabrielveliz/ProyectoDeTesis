<?php

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=InventarioPrestashop.xls");

  include ("../include/coneccion_prestashop.php");    
    $consulta = "select ps_product_lang.id_product ,ps_product_lang.name , ps_stock_available.quantity, indexed from ps_product_lang join ps_stock_available on ps_product_lang.id_product= ps_stock_available.id_product join ps_product on ps_product_lang.id_product= ps_product.id_product where LENGTH(name)>0 order by name ASC";
    $ejecuta = mysql_query($consulta,$coneccion);  

     $consulta2 = "select ps_product.id_product,ps_product_lang.name 'nombre1',ps_order_state_lang.name 'nombre2', ps_orders.date_upd from ps_product join ps_product_lang on ps_product.id_product=ps_product_lang.id_product join ps_order_detail on ps_product.id_product=ps_order_detail.product_id  join ps_orders on ps_orders.id_order=ps_order_detail.id_order join ps_order_state_lang on ps_orders.current_state = ps_order_state_lang.id_order_state order by ps_orders.date_upd ";
    $ejecuta2 = mysql_query($consulta2,$coneccion);   
?>
<html>
    <head>
    <title>Inventario PrestaShop</title>
            <link rel="icon" type="image/png" href="../../assets/img/icono.png" />
                <link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <div>
          <img id="lo" src="../../img/logo.png">
       </div>
    <div id="bienvenida">
<span><p>Inventario Tienda Virtual PrestaShop</p></span>
    </div>
    </head>
    <body>
  
        <table id="lista" width="100%" align="center" >
            <caption>LISTADO DE PRODUCTOS</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>Estado Stock</th>
                    <th>Visibilidad</th>

                </tr>
            </thead>
            <tbody>
             <?php
            
                $a1=0;
                while ($row1=mysql_fetch_array($ejecuta))
                    {
                        $a1=$a1+1;
                        $id1 = $row1["id_product"] ;
                        echo "<tr>";                    
                            echo ("<td>$row1[id_product]</td>");
                            echo ("<td>$row1[name]</td>");
                            echo ("<td>$row1[quantity]</td>");

                    if($row1['quantity']<5 )
                        {echo ("<td style='background:red;'>CRITICO</td>");}
                    if($row1['quantity']>4 and $row1['quantity']<10)
                        {echo ("<td style='background:orange;'>BAJO</td>");}
                    if($row1['quantity']>9 and $row1['quantity']<20)
                        {echo ("<td style='background:yellow; '>ACEPTABLE</td>");}
                    if($row1['quantity']>19)
                        {echo ("<td style='background:#27FF00;'>NORMAL</td>");}
                    if($row1['indexed']==1)
                        echo ("<td>ACTIVO</td>");
                    if($row1['indexed']==0)
                        echo ("<td style='color:red;'>NO VISIBLE</td>");


                        
                        echo "</tr>";                    
                        }
            ?>
            
            </tbody>
        </table>
                 <center> <table id="lista" width="100%" align="center">
            <br/>
            <caption><h2>Productos Reservados</h2></caption>
            <thead>
                <tr>

                    <th>Producto</th>
                    <th>Estado</th>
                    <th>Fecha</th>



                </tr>
            </thead>
            <tbody>
            <?php
            
                $a2=0;
                while ($row1=mysql_fetch_array($ejecuta2))
                    {
                        $a2=$a2+1;
                        $id1 = $row1["id_product"] ;
                        echo "<tr>";                    
                            
                            echo ("<td>$row1[nombre1]</td>");
                            echo ("<td>$row1[nombre2]</td>");
                            echo ("<td>$row1[date_upd]</td>");


                        
                        echo "</tr>";                    
                        }
            ?>
            
            </tbody>

        </table>
        </center>
    </body>
