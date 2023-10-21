<style>
   body {
  background-color: #eee;
}
</style>



<nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: #024A7F;">
  <div class="container-fluid navbar-container">
    <a class="navbar-brand" href="<?= base_url('home/index') ?>">
        <img class="img-fluid" src="<?= base_url('img/logo.svg') ?>" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Itens de navegação -->
      </ul>

      <!-- Botão de Configurações -->
      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#configModal">
        Configurações
      </button>
      
      <!-- Formulário de pesquisa -->
    </div>
  </div>
</nav>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<div class="modal fade" id="configModal" tabindex="-1" aria-labelledby="configModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="configModalLabel">Configurações</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulário para atualizar o nome de usuário -->
        <form action="<?= base_url('home/updateUsername') ?>" method="post">
            <div class="mb-3">
                <label for="newUsername" class="form-label">Novo nome de usuário:</label>
                <input type="text" class="form-control" id="newUsername" name="newUsername" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Nome de Usuário</button>
        </form>

        <!-- Formulário para atualizar a senha -->
        <form action="<?= base_url('home/updatePassword') ?>" method="post" class="mt-3">
            <div class="mb-3">
                <label for="newPassword" class="form-label">Nova senha:</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Senha</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<div class="card shadow-lg p-3 mb-5 bg-body rounded ">
  <h2 class="card-header">AirPolution</h2>
  <div class="card-body">
    <h5 class="card-title">Verifique a poluição do ar em sua cidade</h5>
    <p class="card-text">Pesquisa o Nome da Cidade/Estado/País que deseja verificar a qualidade do Ar</p>
    <input type="text" id="cityInput" placeholder="Digite o nome da cidade">
    <button class="btn btn-primary" onclick="getAirPollutionData()">Pesquisar</button>
  </div>
</div>

<div class="card shadow-lg p-3 mb-5 bg-body rounded">
<h3>Resultados:</h3>
  <div class="card-body">
  <div id="results"></div>
  </div>
</div>




<script>
    async function getAirPollutionData() {
        const city = document.getElementById('cityInput').value;
        const apiKey = 'c41986cd1d3f1f81c64fbb3b74800323';

        // Obtém a latitude e longitude da cidade usando a API do OpenWeatherMap
        const geoResponse = await fetch(`http://api.openweathermap.org/geo/1.0/direct?q=${city}&limit=1&appid=${apiKey}`);
        const geoData = await geoResponse.json();

        if (!geoData.length) {
            document.getElementById('results').innerText = "Erro ao obter informações da cidade.";
            return;
        }

        const lat = geoData[0].lat;
        const lon = geoData[0].lon;

        // Obtém dados de poluição do ar
        const airPollutionResponse = await fetch(`http://api.openweathermap.org/data/2.5/air_pollution?lat=${lat}&lon=${lon}&appid=${apiKey}`);
        const airPollutionData = await airPollutionResponse.json();

        // Aqui você pode formatar e exibir os dados no div de resultados
        document.getElementById('results').innerText = JSON.stringify(airPollutionData);

        // Para obter dados históricos (opcional)
        const startTimestamp = Math.floor(Date.now() / 1000) - 86400 * 7; // Uma semana atrás
        const endTimestamp = Math.floor(Date.now() / 1000);
        
        const airPollutionHistoryResponse = await fetch(`http://api.openweathermap.org/data/2.5/air_pollution/history?lat=${lat}&lon=${lon}&start=${startTimestamp}&end=${endTimestamp}&appid=${apiKey}`);
        const airPollutionHistoryData = await airPollutionHistoryResponse.json();

        // Adicione os dados históricos ao div de resultados ou a outro lugar da sua escolha
    }
</script>
