<style>
    .error{
        color: #fff;
    }
</style>
<aside class="sidebar">
                <div class="login block-aside">
                    <?php
                        if(isset($_SESSION['login'])){
                                echo "<span class='error'>{$_SESSION['login']}</span><br>";
                                unset($_SESSION['login']);
                        }
                        if(isset($_SESSION['usuario'])){
                            echo "<div class='logueado'><span>Bienvenido "."{$_SESSION['usuario']['nombre']} "."{$_SESSION['usuario']['apellidos']}</span></div>";
                            echo "<div class='boton'><a href='crear-categoria'>Crear Categorías</a></div>";
                            echo "<div class='boton'><a href='crear-entrada'>Crear Entradas</a></div>";
                            echo "<div class='boton'><a href='mi-perfil'>Mis datos</a></div>";
                            echo "<div class='boton'><a href='includes/cerrar'>Cerrar Sesión</a></div>";
                        }
                    ?>
                    <?php if(!isset($_SESSION['usuario'])) : ?>
                    <h3>Identifícate</h3>
                    <?php
                        if(isset($_SESSION['errores0'])){
                            foreach ($_SESSION['errores0'] as $error) {
                               echo "<span class='error'>$error</span><br>";
                            }
                            unset($_SESSION['errores0']);
                        }
                    ?>
                    <form action="includes/login.php" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php if (isset($_SESSION['email_login'])){ echo $_SESSION['email_login']; unset($_SESSION['email_login']); } ?>">
    
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password">
    
                        <input type="submit" value="Entrar">
                    </form>
                    <?php endif; ?>
                </div>
                <?php if(!isset($_SESSION['usuario'])) : ?>
                <div class="registro block-aside">
                    <?php
                        if(isset($_SESSION['completado'])){
                            echo "<span class=error>{$_SESSION['completado']}</span>";
                            unset($_SESSION['completado']);
                        }
                    ?>
                    <h3>Regístrate</h3>
                    <?php
                        if(isset($_SESSION['errores'])){
                            foreach ($_SESSION['errores'] as $error) {
                                echo "<span class='error'>$error</span><br>";
                            }
                            unset($_SESSION['errores']);
                        }
                    ?>
                    <form action="includes/registro.php" method="post">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php if (isset($_SESSION['nombre'])){ echo $_SESSION['nombre']; unset($_SESSION['nombre']); } ?>">
    
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" value="<?php if (isset($_SESSION['apellidos'])){ echo $_SESSION['apellidos']; unset($_SESSION['apellidos']); } ?>">
                        
                        <label for="email-0">Email</label>
                        <input type="email" name="email" id="email-0" value="<?php if (isset($_SESSION['email-0'])){ echo $_SESSION['email-0']; unset($_SESSION['email-0']); } ?>">
    
                        <label for="password-0">Contraseña</label>
                        <input type="password" name="password" id="password-0" value="<?php if (isset($_SESSION['password-0'])){ echo $_SESSION['password-0']; unset($_SESSION['password-0']); } ?>">
    
                        <input type="submit" value="Registrarse">
                    </form>
                </div>
                <?php endif; ?>
            </aside>