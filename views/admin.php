<div class="container">
    <h1>Liste des messages</h1>
    <table class="table table-hover">
        <thread>
            <tr class="table-active">
                <th id="t-id" scope="col">Id</th>
                <th id="t-name" scope="col">Nom</th>
                <th id="t-mail" scope="col">Adresse e-mail</th>
                <th id="t-message" scope="col">Message</th>
                <th id="t-btn-view-more" class="td-view-more" scope="col"></th>
                <th id="t-btn-viewed" class="td-viewed" scope="col"></th>
            </tr>
        </thread>
        <tbody>
            <?php foreach ($messages as $message) : ?>
                <tr>
                    <th scope="row" class="userid">
                        <?php echo $message->getId(); ?>
                    </th>
                    <td class="username">
                        <?php echo $message->getName(); ?>
                    </td>
                    <td class="useremail">
                        <?php echo $message->getEmail(); ?>
                    </td>
                    <td class="usermessage">
                        <?php echo $message->getMessage(); ?>
                    </td>
                    <td class="view-more">
                        <button class="btn btn-primary td-btn">Afficher plus</button>
                    </td>
                    <td class="userviewed">
                        <?php echo $message->getViewed(); ?>
                        <button class="btn btn-primary">Marquer comme lu</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="/assets/js/TableManager.js"></script>