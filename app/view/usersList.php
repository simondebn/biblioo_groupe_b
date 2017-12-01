<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 15:32
 */

//Liste des livres

//echo '<img src="data:image/jpeg;base64,'.base64_encode( $books['couverture'] ).'"/>';
?>
<div id="books">
  <input class="search" placeholder="Search" />
    <button class="sort" data-sort="titre">Sort by titre</button>
    <button class="sort" data-sort="auteur">Sort by auteur</button>
    <button class="sort" data-sort="domaine">Sort by domaine</button>
    <button class="sort" data-sort="date">Sort by date</button>
    <table>
    <!-- IMPORTANT, class="list" have to be at tbody -->
    <tbody class="list">
      <?php
        foreach ($books as $book){
            echo '<tr>';
            echo '<td><img height="200px" width="200px" src="data:image/jpeg;base64,'.base64_encode( $book['couverture'] ).'"/></td>';
            echo '<td class="titre">'.$book['titre'].'</td>';
            echo '<td class="auteur">'.$book['auteur'].'</td>';
            echo '<td class="domaine">'.$book['domaine'].'</td>';
            echo '<td class="date">'.$book['date'].'</td>';
            echo '<td><input type="button" data-id="'.$book['id'].'" id="reserver" value="Réserver"></td>';
            echo '</tr>';
        }

      ?>
    </tbody>
  </table>

</div>
<div class="modal fade dvd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    </div>
</div>

<!--liste des Revues-->
