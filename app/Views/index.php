<style>
   body {
  background-color: #eee;
}
#emoji-icon{
    font-size: 5rem;
    
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
    <h2 class="card-header">Qualitative</h2>
    <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <span id="emoji-icon"></span>
        <span id="info-qualidade"></span>
    </div>
</div>




<div class="card shadow-lg p-3 mb-5 bg-body rounded">
<div class="chart-container">
<h3>Pollutant concentration:</h3>
    <canvas id="myChart" ></canvas>
  </div>
  <div class="card-body">
  <h10 class="card-title">
    
  CO: <span id="coValue" style="color: rgba(0, 191, 255)"></span>

   NO: <span id="noValue" style="color: rgba(0, 255, 0, 0.5)"></span>

    NO₂: <span id="no2Value" style="color: rgba(0, 0, 255, 0.5)"></span>

      O₃: <span id="o3Value" style="color: rgba(255, 255, 0, 0.5)"></span>

       SO₂: <span id="so2Value" style="color: rgba(255, 0, 255, 0.5) "></span>

        PM₂.₅: <span id="pm2_5Value" style="color: rgba(0, 255, 255, 0.5) "></span>

          PM₁₀: <span id="pm10Value" style="color: rgba(128, 128, 128, 0.5)"></span>

            NH₃: <span id="nh3Value" style="color: rgba(128, 0, 128, 0.5)"></span>

        
        </h10>
  </div>
</div>

<div class="card shadow-lg p-3 mb-5 bg-body rounded">
    <h2 class="card-header">Conheça a Inversão Termais</h2>
    <div class="card-body d-flex flex-column justify-content-center align-items-center">

        <!-- Primeiro botão e conteúdo -->
        <div>
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseOne" role="button" aria-expanded="false" aria-controls="collapseOne">
                O que é Inversões Termicas
            </a>
        </div>
        <br>
        <div class="collapse" id="collapseOne">
            <div class="card card-body">
            <iframe src="https://www.youtube.com/embed/yPRbh-nZuvo?si=oWR0_KFY8qmKZzQ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>

        <br>

        <!-- Segundo botão e conteúdo -->
        <div>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            O Impacto das Inversões Termicas
            </button>
        </div>
        <br>
        <div class="collapse" id="collapseTwo">
            <div class="card card-body">
            <iframe src="https://www.youtube.com/embed/neVkrp8nH2A?si=gXErZH8vra1S65AF" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
                <br>
        <!-- Terceiro botão e conteúdo -->
        <div>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Por Que Criamos o Aplicativo de Qualidade do Ar?
            </button>
        </div>
        <br>
        <div class="collapse" id="collapseThree">
            <div class="card card-body">
            A qualidade do ar que respiramos tem impacto direto em nossa saúde e bem-estar. Com a urbanização acelerada e o aumento das emissões industriais, é cada vez mais comum nos depararmos com episódios de poluição atmosférica e má qualidade do ar, especialmente em grandes centros urbanos.

Um fenômeno preocupante e que potencializa ainda mais os efeitos da poluição é a inversão térmica. Em condições normais, o ar próximo ao solo é mais quente e menos denso, o que permite que ele suba e disperse os poluentes. No entanto, durante a inversão térmica, uma camada de ar frio e mais denso se forma próxima ao solo, prendendo o ar quente e os poluentes logo acima dela. Isso resulta em uma concentração maior de poluentes próximos ao solo, tornando o ar que respiramos potencialmente perigoso.

Com o objetivo de ajudar a população a se manter informada e protegida, desenvolvemos nosso aplicativo. Ele fornece informações em tempo real sobre a qualidade do ar e os níveis de poluentes em sua localidade. Mais do que simples números, nosso app indica se a qualidade do ar está "OK" ou "Perigosa", tornando mais fácil para todos entenderem a situação e tomarem as precauções necessárias.

Quando o Ar Não Está Bom, Use Máscara!

Se o aplicativo indicar que o ar em sua região não está bom, recomendamos fortemente que use uma máscara ao sair de casa. A máscara ajuda a filtrar os poluentes e a proteger suas vias respiratórias. Lembre-se, a prevenção é sempre o melhor remédio.

Nossa saúde e a saúde do planeta estão interligadas. Fique informado, proteja-se e juntos podemos respirar um ar mais limpo e puro! 🌍💙
            </div>
        </div>

    </div>
</div>
  


  <script>

    let myChart;
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
        // document.getElementById('results').innerText = JSON.stringify(airPollutionData);

        // Para obter dados históricos (opcional)
        const startTimestamp = Math.floor(Date.now() / 1000) - (86400 * 30 * 8); // 86400 segundos em um dia, 30 dias em um mês
        const endTimestamp = Math.floor(Date.now() / 1000);
        
        // const airPollutionHistoryResponse = await fetch(`http://api.openweathermap.org/data/2.5/air_pollution/history?lat=${lat}&lon=${lon}&start=${startTimestamp}&end=${endTimestamp}&appid=${apiKey}`);
        // const airPollutionHistoryData = await airPollutionHistoryResponse.json();

        // console.log(airPollutionHistoryData);

        // // document.getElementById('History').innerText = airPollutionHistoryData;


        const main = airPollutionData.list[0].main;

        const qualidade = main.aqi;

        let iconHTML;
        let infoHTML = '';

        switch (qualidade) {
            case 1:
                iconHTML = '<i class="bi bi-emoji-laughing-fill"></i>';
                infoHTML = '<p> Good </p>';
                break;
            case 2:
                iconHTML = '<i class="bi bi-emoji-smile-fill"></i>';
                infoHTML = '<p> Fair </p>';
                break;
            case 3:
                iconHTML = '<i class="bi bi-emoji-neutral-fill"></i>';
                infoHTML = '<p> Moderate </p>';
                break;
            case 4:
                iconHTML = '<i class="bi bi-emoji-frown-fill"></i>';
                infoHTML = '<p> Poor </p>';
                break;
            case 5:
                iconHTML = '<i class="bi bi-emoji-dizzy-fill"></i>';
                infoHTML = '<p> Very Poor </p>';
                break;
            default:
                iconHTML = ''; // Se o valor não corresponder a 1-5, não exibirá nenhum ícone
        }

        document.getElementById('info-qualidade').innerHTML = infoHTML;
        document.getElementById('emoji-icon').innerHTML = iconHTML;




        const components = airPollutionData.list[0].components;

        const co = components.co;
        const no = components.no;
        const no2 = components.no2;
        const o3 = components.o3;
        const so2 = components.so2;
        const pm2_5 = components.pm2_5;
        const pm10 = components.pm10;
        const nh3 = components.nh3;

        document.getElementById('coValue').innerText = co;
        document.getElementById('noValue').innerText = no;
        document.getElementById('no2Value').innerText = no2;
        document.getElementById('o3Value').innerText = o3;
        document.getElementById('so2Value').innerText = so2;
        document.getElementById('pm2_5Value').innerText = pm2_5;
        document.getElementById('pm10Value').innerText = pm10;
        document.getElementById('nh3Value').innerText = nh3;

        

        const data = {
      datasets: [{
        data: [
          { value: Math.ceil(co), x: 30, y: 10, label: 'CO', color: 'rgba(0, 191, 255)' },
          { value: Math.ceil(no), x: 60, y: 20, label: 'NO', color: 'rgba(0, 255, 0, 0.5)' },
          { value: Math.ceil(no2), x: 20, y: 30, label: 'NO2', color: 'rgba(0, 0, 255, 0.5)' },
          { value: Math.ceil(o3), x: 40, y: 40, label: 'O3', color: 'rgba(255, 255, 0, 0.5)' },
          { value: Math.ceil(so2), x: 80, y: 50, label: 'SO2', color: 'rgba(255, 0, 255, 0.5)' },
          { value: Math.ceil(pm2_5), x: 55, y: 60, label: 'PM2.5', color: 'rgba(0, 255, 255, 0.5)' },
          { value: Math.ceil(pm10), x: 45, y: 70, label: 'PM10', color: 'rgba(128, 128, 128, 0.5)' },
          { value: Math.ceil(nh3), x: 30, y: 80, label: 'NH3', color: 'rgba(128, 0, 128, 0.5)' },
        ]
      }]
    };

    
    const config = {
      type: 'bubble',
      data: data,
      options: {
        scales: {
          x: {
            type: 'linear',
            position: 'bottom',
            min: 0,
            max: 100,
          },
          y: {
            type: 'linear',
            position: 'left',
            min: 0,
            max: 100,
          },
        },
        elements: {
          point: {
            radius: function(context) {
              const desiredBubbleCount = 5;
              return 100 / desiredBubbleCount;
            },
            backgroundColor: function(context) {
              return context.raw.color;
            },
            borderColor: function(context) {
              return context.raw.color;
            },
            borderWidth: 2,
            label: function(context) {
              return context.raw.label;
            },
          },
        },
        plugins: {
          legend: {
            display: false,
          },
        },
        animation: {
          duration: 1000,
          easing: 'linear',
          onComplete: function(animation) {
            requestAnimationFrame(updateBubblePositions);
          },
        },
      },
    };

    const ctx = document.getElementById('myChart').getContext('2d');

    if (myChart) {
        myChart.destroy();
    }
    
    myChart = new Chart(ctx, config);

    const legendContainer = document.getElementById('legend');

    function updateBubblePositions() {
  const chart = myChart;
  const datasets = chart.data.datasets;

  datasets.forEach(dataset => {
    dataset.data.forEach(point => {
      point.x += (Math.random() - 0.5) * 2;
      point.y += (Math.random() - 0.5) * 2;

      point.x = Math.max(0, Math.min(100, point.x));
      point.y = Math.max(0, Math.min(100, point.y));
    });
  });

  chart.update();
  requestAnimationFrame(updateBubblePositions);
}

function generateBubbles() {
  const chart = myChart;
  const datasets = chart.data.datasets;

  const newDatasets = datasets.map(dataset => {
    return {
      data: dataset.data.reduce((acc, point) => {
        return acc.concat(Array.from({ length: point.value }, () => {
          return {
            x: point.x + (Math.random() - 0.5) * 2,
            y: point.y + (Math.random() - 0.5) * 2,
            r: point.r,
            label: point.label,
            color: point.color,
          };
        }));
      }, []),
    };
  });

  chart.data.datasets = newDatasets;

  chart.update();
  requestAnimationFrame(updateBubblePositions);
    }   

    generateBubbles();


    updateBubblePositions();

        // Adicione os dados históricos ao div de resultados ou a outro lugar da sua escolha
    }
</script>
