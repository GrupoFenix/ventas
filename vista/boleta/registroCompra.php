<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div><br><br><br>
<section class="content mb-4">
<div class="container-fluid d-flex justify-content-center">
  <div class="row ">
    <div class="card card-success card-outline col-md-6 justify-content-center m-auto mt-4">
        <h2 class="text-center text-bold text-danger">Gracias por su compra</h2>
        <img class="m-auto" src="recursos/images/fenix.webp" alt="">
        <h4 class="text-center">Su producto muy pronto estará en sus manos</h4>
        <div class="d-grid gap-2 col-6 mx-auto mb-3">
          <a href="?" class="btn btn-success" type="button">Retornar</a>
        </div>
    </div><br>
    <div class="align-self-center"></div><br>
    <div class="card card-success card-outline col-md-6 justify-content-center m-auto mb-4">
        <h2 class="text-center text-bold text-success">Se generó la Boleta</h2>
        <h4>
          <strong>Numero: </strong> <?=$data[0]['numero']?>
        </h4>
        
        <p><strong>Fecha: </strong> <?=$data[0]['fecha']?></p>
        <p><strong>Total: </strong> S/ <?=number_format($data[0]['total'], 2, ',', ' ');?></p>
        <br><hr><br>
        <div class="d-grid gap-2 col-6 mx-auto mb-3">
          <a target="_blank" rel="noopener" href="?ctrl=CtrlBoleta&accion=imprimir&id=<?=$data[0]['idboletas']?>" class="btn btn-success">
          <i class="fas fa-print"></i> Imprimir Boleta</a>
        </div>
    </div>
  </div>
</div>
</section><br><br>