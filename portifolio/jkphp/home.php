<body>
  <!-- alinhando o nome do login no centro da tel -->
  <div align="center">
    <!-- abre php -->
    <?php 
      // chamando o navbar
      include("nav.php");
    ?>
    <hr>
  </div>
  <!-- colocar  detalhes sobre produtos que trabalha, horarios de funcionamentos etc..  -->
  <div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">TITULO 1</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">TITULO 2</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">TITULO 3</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>

</body>
<!-- abro o php para chamar o rodapé -->
  <?php
    include('footer.html');
  ?>
