 <?php
    include('validaADM.php');
    include_once('conexao.php');

    $pdf = '<table border=1px>';
    $pdf .= '<thead>';
    $pdf .= '<tr>';
    $pdf .= '<td>Código:</td>';
    $pdf .= '<td>Nome:</td>';
    $pdf .= '<td>Valor:</td>';
    $pdf .= '<td>Tamanho:</td>';
    $pdf .= '<td>Cor:</td>';
    $pdf .= '<td>Quantidade:</td>';
    $pdf .= '<td>Marca:</td>';
    $pdf .= '<td>Fornecedor:</td>';
    $pdf .= '</tr>';
    $pdf .= '</thead>';

    $busc = "SELECT P.*, E.quantidade FROM produto AS P INNER JOIN estoque AS E WHERE P.codigo = E.cod_produto";
    $pega = mysqli_query($strcon, $busc);
        while($reg = mysqli_fetch_assoc($pega)){
            $pdf .= '<tbody>';
            $pdf .= '<tr><td>' .$reg['codigo'] . "</td>";
            $pdf .= '<td>' .$reg['nome'] . "</td>";
            $pdf .= '<td>' .$reg['valor'] . "</td>";
            $pdf .= '<td>' .$reg['tamanho'] . "</td>";
            $pdf .= '<td>' .$reg['cor'] . "</td>";
            $pdf .= '<td>' .$reg['quantidade'] . "</td>";
            $pdf .= '<td>' .$reg['marca'] . "</td>";
            $pdf .= '<td>' .$reg['id_fornecedor'] . "</td></tr>";
            $pdf .= '</tbody><br>';
        } 

    $pdf .= '</table';

     use Dompdf\Dompdf;

        require_once ("dompdf/autoload.inc.php");
        
       $Estoque = new Dompdf();

       $Estoque->loadHtml('
           <h1 style="text-align:center;">Relatório do estoque</h1>
            '.$pdf.'
       ');

       $Estoque->render();

      $Estoque->stream(
           "Relátorio de Estoque",
            array(
                "Attachment" => false
            )
        );

        $del = "DELETE P FROM produto AS P INNER JOIN estoque AS E ON P.codigo = E.cod_produto WHERE E.quantidade <= 0";
        $resDel = mysqli_query($strcon, $del) or die("Estoque não pode ser atualizado!");

        $delet = "DELETE E FROM estoque AS E WHERE E.quantidade <= 0";
        $resDelet = mysqli_query($strcon, $delet) or die("Estoque não pode ser atualizado!");

?>
