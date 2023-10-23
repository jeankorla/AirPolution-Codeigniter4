# Sistema Web Mobile para Controle de Qualidade do Ar

Nosso sistema web é focado em dispositivos móveis e tem como principal objetivo fornecer informações em tempo real sobre a qualidade do ar. Ele é perfeito para quem deseja entender as condições atmosféricas de uma localidade específica a qualquer momento.

## Tecnologias Utilizadas

- **Backend**: CodeIgniter 4
- **Banco de Dados**: MySQL com phpMyAdmin
- **Frontend**:
  - JavaScript puro
  - Bootstrap

## Funcionalidades

### Login e Gerenciamento de Conta

Permitimos que os usuários se registrem e façam login. Dentro do aplicativo, os usuários têm a flexibilidade de:

- Mudar o nome de usuário
- Alterar a senha

### Pesquisa de Qualidade do Ar

Ao pesquisar por uma cidade, estado ou país, os usuários receberão um feedback imediato sobre a qualidade do ar do local escolhido. O feedback é apresentado através de um emoji-con acompanhado de um texto. As categorias de qualidade do ar incluem:

- **Good**
- **Fair**
- **Moderate**
- **Poor**
- **Very Poor**

A informação é obtida em tempo real utilizando a API da [OpenWeather](http://api.openweathermap.org/data/2.5/air_pollution?lat={lat}&lon={lon}&appid={API key}).

### Gráficos de Concentração de Poluentes

Com o auxílio da biblioteca Charts JS, ilustramos as concentrações de poluentes em μg/m3. O gráfico abrange os seguintes poluentes:

- SO2
- NO2
- PM10
- PM2.5
- O3
- CO

As legendas no gráfico fornecem informações claras sobre as quantidades de cada poluente, permitindo uma análise visual e quantitativa.

### Seção de Aprendizado

Para aqueles interessados em aprender mais sobre a qualidade do ar e sua importância, adicionamos:

- Vídeos do YouTube, acessados através de iframes
- Um texto explicativo que detalha a motivação por trás da criação deste aplicativo

## Conclusão e Agradecimentos

Este aplicativo web foi desenvolvido em um período intenso de menos de 6 horas como parte de um projeto para a Universidade Paulista (UNIP). Gostaria de expressar minha profunda gratidão ao meu colega, RodrigoTemporim, pela dedicação e esforço contínuos durante essa maratona de desenvolvimento.

