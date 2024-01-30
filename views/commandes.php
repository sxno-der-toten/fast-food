<section class="orders">
    <h2><u>Vos commandes</u></h2>
    <table class="tableO">
        <tr>
            <th> Référence </th>
            <th> Nom Utilisateur </th>
            <th> Date </th>
            <th> Livrable </th>
            <th> Date Livraison </th>            
            <th> Produits </th>
            <th> Prix </th>
            <th> Consulter </th>
            <th> PDF</th>
        </tr>
        <?php foreach ($orderDetailsData as $orderDetail) { ?>
            <tr>
                <td><?= $orderDetail['id'] ?></td>
                <td><?= $orderDetail['user_lastname'] ?></td>
                <td><?= $orderDetail['order_date'] ?></td>
                <td><?= ($orderDetail['can_be_delivered'] == 1) ? 'Oui' : 'Non' ?></td>
                <td><?= $orderDetail['delivered_date'] ?></td>                
                <td><?= $orderDetail['product_name'] ?></td>
                <td><?= $orderDetail['selling_price'] ?></td>
                <td>  </td>
                <td>  </td>
            </tr>
        <?php } ?>
    </table>
</section>