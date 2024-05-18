// Função para carregar cores do servidor
function loadCores() {
  $.ajax({
      url: '../../list_cores.php', // Substitua pelo caminho correto
      method: 'GET',
      success: function(data) {
          populateCoreSelector(data);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error('Error loading cores:', textStatus, errorThrown);
      }
  });
}

// Função para popular o seletor de cores
function populateCoreSelector(cores) {
  var coreSelector = $('#core-selector');
  coreSelector.empty(); // Limpa o dropdown atual

  cores.forEach(function(core) {
      var coreDisplayName = core.replace(/_/g, ' '); // Opcional: Formatação do nome
      var coreItem = $('<a>')
          .addClass('dropdown-item')
          .attr('href', 'javascript:void(0);')
          .attr('data-core', core)
          .text(coreDisplayName);

      coreSelector.append(coreItem);
  });

  // Adiciona evento de clique para os novos itens
  $('#core-selector a').click(function() {
      var coreChoice = $(this).data('core');
      loadCore(coreChoice);
  });
}

$(document).ready(function() {
    // Quando o botão com ID dropdownMenu1 for clicado
    $('#dropdownMenu1').click(function() {
        // Exibe a div com ID core-selector
        $('#core-selector').toggle();
    });

    // Quando o botão com ID btnHideMenu for clicado
    $('#btnHideMenu').click(function() {
        // Esconda a div com ID formInline
        $('#formInline').toggle();
        $('#dropdownMenu1').toggle();
        $('#core-selector').toggle();
        $('#core-selector').hide();
    });

    // Ouvinte de evento de clique para os links dentro de #core-selector
    $('#core-selector').on('click', 'a', function() {
        // Obtém os valores dos atributos data-core, id e name do link clicado
        var dataCore = $(this).attr('data-core');
        var linkId = $(this).attr('id');
        var linkName = $(this).attr('name');

        const met = 'coreSelected';

        // Envia os dados para o PHP via método GET
        $.get('procFct.php', {
            dataCore: dataCore,
            linkId: linkId,
            linkName: linkName,
            met: met
        }, function(response) {
            // Ação a ser realizada após o consumo do arquivo PHP, se necessário
            $('#imgAlien').hide();
            $('#core-selector').hide();
            $('.main-content').html(response);
        });
    });

    const btnFullscreen = document.getElementById('btnFullscreen');

    // Variável para controlar o estado de tela cheia
    let isFullScreen = false;
    
    // Adicionar um listener de evento ao botão
    btnFullscreen.addEventListener('click', function () {
    
      if (isFullScreen) {
        // Sair do modo de tela cheia
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.webkitExitFullscreen) { /* Safari */
          document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) { /* IE11 */
          document.msExitFullscreen();
        }
    
        // Atualizar o estado de tela cheia
        isFullScreen = false;
      } else {
        // Obter o elemento raiz da página HTML
        const rootElement = document.documentElement;
    
        // Entrar em modo de tela cheia no elemento raiz
        if (rootElement.requestFullscreen) {
          rootElement.requestFullscreen();
        } else if (rootElement.webkitRequestFullscreen) { /* Safari */
          rootElement.webkitRequestFullscreen();
        } else if (rootElement.msRequestFullscreen) { /* IE11 */
          rootElement.msRequestFullscreen();
        }
    
        // Atualizar o estado de tela cheia
        isFullScreen = true;
      }
    });

    // Carrega e executa uma ROM
    /* function loadAndRunRom(romPath) {
        // Verifica se a API Libretro está disponível
        if (window.Libretro) {
            // Carrega a ROM usando a função loadGame() da API
            Libretro.loadGame(romPath, function(result) {
                if (result.success) {
                    console.log('ROM carregada com sucesso.');
                    
                    // Inicia a execução da ROM
                    Libretro.runGame();
                } else {
                    console.error('Erro ao carregar a ROM:', result.error);
                }
            });
        } else {
            console.error('A API Libretro não está disponível.');
        }
    } */

    // Exemplo de uso: carrega e executa a ROM especificada
    //loadAndRunRom('caminho/para/sua/rom.zip');
});

// Carregar cores ao inicializar
loadCores();