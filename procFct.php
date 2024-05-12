<?php
if(isset($_GET['dataCore']) && isset($_GET['linkId']) && isset($_GET['linkName']) && isset($_GET['met'])){
    if($_GET['met'] === "playList"){
        $playListsPath = "playlists";
        $playListFile = str_ireplace('_',' ',$_GET['linkName']).'.lpl';
        $fullPlaylistFilePath = $playListsPath.'/'.$playListFile;

        // Lê o conteúdo do arquivo e armazena em uma variável
        $playlistContent = file_get_contents($fullPlaylistFilePath);
        $playlistContentArr = json_decode($playlistContent,true);

        if (strpos($playListFile, 'MAME') !== false) {
            $thumbsRom = "MAME";
        }

        $thumbsNamedBoxartsPath = "thumbnails/$thumbsRom/Named_Boxarts";
        $thumbsNamedSnapsPath = "thumbnails/$thumbsRom/Named_Snaps";
        $thumbsNamedTitlesPath = "thumbnails/$thumbsRom/Named_Titles";

        // Loop para exibir o conteúdo de cada linha
        $playListContentHtml = '<div class="row"><h1>'.$thumbsRom.' ROMS</h1><hr style="color: #4285F4;">';
        foreach ($playlistContentArr['items'] as $playListContent) {
            $logFileArr = explode('\\',$playListContent['path']);
            
            if(count($logFileArr) === 5){
                $logFile = str_ireplace('.zip','',$logFileArr[4]).'.lrtl';
                $logFullFilePath = $playListsPath.'/logs/'.str_ireplace('_',' ',$_GET['linkName']).'/'.$logFile;

                $logFExis = file_exists($logFullFilePath);

                if($logFExis === true){
                   // Lê o conteúdo do arquivo e armazena em uma variável
                    $logContent = file_get_contents($logFullFilePath);
                    $logContentArr = json_decode($logContent,true);
                    $logRuntime = $logContentArr['runtime'];
                    $logLastPlayed = $logContentArr['last_played'];
                    
                    $logHtml = '<p></p><center><p class="card-text" style="background-color: #4285F4; color: #fff;">Last Played<br>' . date("d/m/Y H:i", strtotime($logLastPlayed)) . '</p></center>';
                    $logHtml .= '<center><p class="card-text" style="background-color: #000080; color: #fff;">Runtime<br>' . $logRuntime . '</p></center>'; 
                } else {
                    $logHtml = '<p></p><center><p class="card-text" style="background-color: #4285F4; color: #fff;"><br></p></center>';
                    $logHtml .= '<center><p class="card-text" style="background-color: #000080; color: #fff;"><br></p></center>';
                }
            }

            // Verifica se o arquivo de imagem do boxart existe e define o caminho correspondente
            $boxartPath = $thumbsNamedBoxartsPath . "/" . str_ireplace(':', '_', $playListContent['label']) . '.png';
            $playListContent['thumbsNamedBoxartsPath'] = file_exists($boxartPath) ? $boxartPath : 'assets/imgs/logo2.png';

            // Adiciona o item à galeria de imagens
            $playListContentHtml .= '
                <div class="col-md-3 mb-3">';
            $playListContentHtml .= '        <div class="card" id="' . $playListContent['label'] . '" name="' . $playListContent['label'] . '">
                        <img src="' . $playListContent['thumbsNamedBoxartsPath'] . '" class="card-img-top" alt="' . $playListContent['label'] . '">
                        <div class="card-body">
                            <h3 class="card-title">' . $playListContent['label'] . '</h3>
                            <!-- Outras informações podem ser adicionadas aqui, se necessário -->
                        ';
                        if(isset($logHtml)){
                            $playListContentHtml .= $logHtml;
                        }

            $playListContentHtml .= '            </div>
                    </div>
                </div>
            ';
        }
        $playListContentHtml .= '</div>';

        // Exibindo a galeria de imagens
        echo $playListContentHtml;
    }
} else {
    exit('Erro. Os dados informados estão incorretos.');
}
?>