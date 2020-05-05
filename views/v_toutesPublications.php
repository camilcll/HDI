<?php require_once(PATH_VIEWS.'header.php');?>

<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<?php
if( isset($_SESSION['id']))
{
  if((time() - $_SESSION['last_time']) > 3600) //Time in Seconds
  {
    header('Refresh:0; url=index.php?page=deconnexion');
    
  }
  else{
    $_SESSION['last_time']= time();
  }
}

?>

<div id="allPublis" class="d-flex justify-content-around align-items-center flex-column">
    <div id="filterContainer">

    </div>
    <div id="publi_container" class="d-flex justify-content-center align-items-center flex-column p-2">
        <div class="publi m-4 rounded-lg p-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore fugiat autem eveniet molestiae sint corporis, perspiciatis officiis, quia soluta, illum nisi reiciendis iure recusandae harum corrupti veritatis omnis! Porro, ipsum?</div>
        <div class="publi m-4 rounded-lg p-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus repudiandae, culpa libero fugiat dolorem iusto accusantium quidem laborum eaque nemo reprehenderit voluptates consectetur laboriosam, corrupti ab dolore animi doloribus vero.</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit, ex exercitationem. Facere assumenda molestiae ipsa corrupti commodi dolorem, rem ex vero sapiente ab deleniti maxime harum accusamus tempore. Aperiam, doloribus!</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab nisi corporis, nihil fuga veritatis, possimus tenetur architecto cumque voluptatibus, corrupti dolorem porro at! Nisi, aut. Cumque assumenda suscipit cupiditate recusandae.</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga, neque amet. Vero, deserunt sit placeat perspiciatis facere quo doloribus quae commodi reiciendis deleniti officiis, labore doloremque repudiandae autem? Expedita, perspiciatis!</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet voluptatem quidem nisi optio incidunt, quam amet perferendis tempora quas cum deleniti quae totam est, odit impedit nemo blanditiis. Alias, rerum!</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus deleniti pariatur tenetur nostrum dolores ipsum qui quibusdam similique odit officia eligendi reprehenderit ducimus alias possimus molestias, ea, ad cumque iusto?</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi nulla eligendi sequi nihil, eum ipsa corporis ab repellendus sint ratione nisi non dolor voluptates natus explicabo corrupti minima voluptatum qui.</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, repellendus similique? Excepturi, veniam error? Doloribus fuga totam odit provident fugiat saepe quam, sit, aliquam eos, fugit recusandae voluptate beatae aliquid?</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque rerum odit saepe obcaecati iste incidunt voluptates repudiandae sint consequuntur officia et ea voluptate quisquam praesentium culpa expedita, quidem eum fugit!</div>
        <div class="publi m-4 rounded-lg p-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore fugiat autem eveniet molestiae sint corporis, perspiciatis officiis, quia soluta, illum nisi reiciendis iure recusandae harum corrupti veritatis omnis! Porro, ipsum?</div>
        <div class="publi m-4 rounded-lg p-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus repudiandae, culpa libero fugiat dolorem iusto accusantium quidem laborum eaque nemo reprehenderit voluptates consectetur laboriosam, corrupti ab dolore animi doloribus vero.</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit, ex exercitationem. Facere assumenda molestiae ipsa corrupti commodi dolorem, rem ex vero sapiente ab deleniti maxime harum accusamus tempore. Aperiam, doloribus!</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab nisi corporis, nihil fuga veritatis, possimus tenetur architecto cumque voluptatibus, corrupti dolorem porro at! Nisi, aut. Cumque assumenda suscipit cupiditate recusandae.</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga, neque amet. Vero, deserunt sit placeat perspiciatis facere quo doloribus quae commodi reiciendis deleniti officiis, labore doloremque repudiandae autem? Expedita, perspiciatis!</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet voluptatem quidem nisi optio incidunt, quam amet perferendis tempora quas cum deleniti quae totam est, odit impedit nemo blanditiis. Alias, rerum!</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus deleniti pariatur tenetur nostrum dolores ipsum qui quibusdam similique odit officia eligendi reprehenderit ducimus alias possimus molestias, ea, ad cumque iusto?</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi nulla eligendi sequi nihil, eum ipsa corporis ab repellendus sint ratione nisi non dolor voluptates natus explicabo corrupti minima voluptatum qui.</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, repellendus similique? Excepturi, veniam error? Doloribus fuga totam odit provident fugiat saepe quam, sit, aliquam eos, fugit recusandae voluptate beatae aliquid?</div>
        <div class="publi m-4 rounded-lg p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque rerum odit saepe obcaecati iste incidunt voluptates repudiandae sint consequuntur officia et ea voluptate quisquam praesentium culpa expedita, quidem eum fugit!</div>
    </div>
</div>

<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); ?>
