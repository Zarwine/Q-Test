<div class="container main-container">
    <h1>Liste des messages non lus</h1>
    <table class="table table-hover">
        <thread>
            <tr class="table-active">
                <th class="t-id" scope="col">Id</th>
                <th class="t-name" scope="col">Nom</th>
                <th class="t-mail" scope="col">Adresse e-mail</th>
                <th class="t-message" scope="col">Message</th>
                <th class="t-btn-view-more" class="td-view-more" scope="col"></th>
                <th class="t-btn-viewed" class="td-viewed" scope="col"></th>
            </tr>
        </thread>
        <tbody>
            <?php if (isset($messages)) : ?>
                <?php foreach ($messages as $message) : ?>
                    <?php if ($message->getViewed() == 0) : ?>
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
                                <?php echo htmlspecialchars($message->getMessage(), ENT_QUOTES); ?>
                            </td>
                            <td class="view-more">
                                <button class="btn btn-primary td-btn">Afficher plus</button>
                            </td>
                            <td class="userviewed">
                                <form action="update/<?php echo $message->getId(); ?>" method="POST">
                                    <button type="submit" class="btn btn-primary td-btn-toggle">Marquer comme lu</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <hr>
    <h1>Liste des messages lus</h1>
    <table class="table table-hover">
        <thread>
            <tr class="table-active">
                <th class="t-id" scope="col">Id</th>
                <th class="t-name" scope="col">Nom</th>
                <th class="t-mail" scope="col">Adresse e-mail</th>
                <th class="t-message" scope="col">Message</th>
                <th class="t-btn-view-more" class="td-view-more" scope="col"></th>
                <th class="t-btn-viewed" class="td-viewed" scope="col"></th>
            </tr>
        </thread>
        <tbody>
            <?php if (isset($messages)) : ?>
                <?php foreach ($messages as $message) : ?>
                    <?php if ($message->getViewed() == 1) : ?>
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
                                <?php echo htmlspecialchars($message->getMessage(), ENT_QUOTES); ?>
                            </td>
                            <td class="view-more">
                                <button class="btn btn-primary td-btn">Afficher plus</button>
                            </td>
                            <td class="userviewed">
                                <form action="update/<?php echo $message->getId(); ?>" method="POST">
                                    <button type="submit" class="btn btn-primary td-btn-toggle">Marquer comme non lu</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="/assets/js/TableManager.js"></script>