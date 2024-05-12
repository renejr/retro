<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emulador Retro</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.1.1/css/mdb.min.css" rel="stylesheet">
    <link href="assets/css/libretro.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <img src="assets/imgs/logo2.png" alt="MDXHQ">
        <!-- <h1>Emulador Retro</h1> -->
    </header>
    <nav class="navbar navbar-dark">
        <button class="btn btn-primary dropdown-toggle btn-outline-success my-2 my-sm-0"" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Emuladores</button>
        <div class="toggleMenu">
            <button class="btn btn-primary btn-outline-success my-2 my-sm-0" id="btnHideMenu" title="Toggle Menu">
                <span class="fa fa-chevron-up" id="icnHideMenu"></span> 
                <span class="sr-only">
                    Hide Top Navigation
                </span>
            </button>
        </div>
        <div class="form-inline" id="formInline">
            <button class="btn btn-primary btn-outline-success my-2 my-sm-0" type="button" id="btnRun" title="Run" onclick="startRetroArch();">
                <span class="fa fa-play" id="icnRun"></span> 
                Run
            </button>
            <button class="btn btn-primary btn-outline-success my-2 my-sm-0 disabled" type="button" id="btnAdd" onclick="document.getElementById('btnRom').click()" title="Add Content" disabled="">
                <span class="fa fa-plus" id="icnAdd"></span> 
                Add Content
            </button>
            <button class="btn btn-primary tooltip-enable btn-outline-success my-2 my-sm-0" id="btnClean" onclick="cleanupStorage();" title="Cleanup storage" data-original-title="Cleanup storage">
                <span class="fa fa-trash-o" id="icnClean"></span> 
                <span class="sr-only">
                    Cleanup
                </span>
            </button>
            <button class="btn btn-primary disabled tooltip-enable btn-outline-success my-2 my-sm-0" id="btnMenu" onclick="keyPress('F1');" title="Menu toggle" disabled="" data-original-title="Menu toggle">
                <span class="fa fa-bars" id="btnMenu"></span> 
                <span class="sr-only">
                    Menu
                </span>
            </button>          
            <button class="btn btn-primary tooltip-enable btn-outline-success my-2 my-sm-0" id="btnFullscreen" title="Fullscreen" data-original-title="Fullscreen">
                <span class="fa fa-desktop" id="icnAdd"></span> 
                <span class="sr-only">
                    Fullscreen
                </span>
            </button>  
            <button type="button" class="btn btn-primary tooltip-enable btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#helpModal" data-original-title="Help" title="Help">
                Help
            </button>
        </div>
    </nav>
    <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMenu1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" id="core-selector">
        <a class="dropdown-item" href="javascript:void(0);" data-core="fb_neo" id="FBNeo_-_Arcade_Games" name="FBNeo_-_Arcade_Games">FinalBurn NeoGeo</a>
        <a class="dropdown-item" href="javascript:void(0);" data-core="mame2003_plus" id="MAME_2003-Plus" name="MAME_2003-Plus">MAME 2003-Plus</a>
    </div>
    <main>
        <div class="content">
            <div class="sidebar">
                <!-- Aqui os elementos para o Sidebar -->
            </div>
            <div class="main-content">
                <img id="imgAlien" id="imgAlien" src="assets/imgs/alien-icon.png" alt="Alien Icon" width="450px">
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; MDXHQ 2024 Emulador Retro. Todos os direitos reservados.</p>
    </footer>
    <!-- Bootstrap JavaScript (opcional, dependendo do uso) -->
    <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="//rawgit.com/jeresig/jquery.hotkeys/master/jquery.hotkeys.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.3.4/js/tether.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script src="assets/js/browserfs.min.js"></script>
    <script src="assets/js/libretro.js"></script>

    <!-- Seu código JavaScript -->
    <script src="assets/js/scripts.js"></script>
</body>
</html>