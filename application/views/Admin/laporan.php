<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1><?= $title ?></h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <?php foreach (array_keys($data[0]) as $key) : ?>
                        <th><?= ucfirst($key) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <?php foreach ($row as $column) : ?>
                            <td><?= $column ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url('Claporan/pdf/' . strtolower(str_replace(' ', '', $title))); ?>" class="btn btn-primary">Download PDF</a>
        <a href="<?= base_url('Claporan/excel/' . strtolower(str_replace(' ', '', $title))); ?>" class="btn btn-success">Download Excel</a>
    </div>
</body>

</html>