<div class="container main-container">
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
                    <td class="username resume">
                        <abbr title="<?php echo $message->getName(); ?>"><?php echo $message->getName(); ?></abbr>
                    </td>
                    <td class="useremail resume">
                        <a href="mailto:<?php echo $message->getEmail(); ?>"><?php echo $message->getEmail(); ?></a>
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