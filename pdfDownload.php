<?php
$uri = $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
$url = 'http://' . $uri. "/". "carrito.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ". $url);
    exit();
}

session_start();

if(!$_SESSION["CART"]){
  $_SESSION["CART"] = array();
  header("Location: ". $url);
  exit();
}

// foreach ($_SESSION["CART"] as $id => $item ) {}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
</head>
<body>
    <input type="hidden" value="<?php echo $_SESSION["CART_TO_PDF"]; ?>" id="cotizacion">
    <script src="jsPDF-1.3.2/dist/jspdf.min.js"></script>
    <script>
        let input = document.getElementById('cotizacion')
        let string1 = input.value.replaceAll("\\n", "\n");
        console.log(string1)
        writePdf(string1);

        //Funciones
        function writePdf(string){
            let doc = new jsPDF();

            doc.setFontSize(18);
            doc.text(10, 15, 'Cotización de los productos');
            doc.setFontSize(14);
            doc.text(10, 25, 'Tus productos:');
            doc.setFontSize(12);
            doc.text(10, 32, string);
            save(doc);
        }
        function save(doc){
            doc.save('Cotización_'+ getDate() +'.pdf');
            setInterval(function(){
             window.close(); 
            }, 10)
        }
        
        function getDate(){
            let date = new Date();
            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();

            if(month < 10){
                let DDMMYY = day+'/0'+month+'/'+year;
                return DDMMYY;
            }else{
                let DDMMYY = day+'/'+month+'/'+year;
                return DDMMYY;
            }
        }
    </script>

</body>
</html>