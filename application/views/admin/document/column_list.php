<table class="table table-striped table-bordered table-hover label-dataTables" >
    <thead>
        <tr>
            <th>Column Name</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($columnArray); $i++) {
            ?>
            <tr>
                <td><?php echo $columnArray[$i]['column_name']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($columnArray[$i]['dt_created'])); ?></td>
            </tr>
        <?php
        }
        if (count($columnArray) == 0) {
            echo '<tr><td colspan="2" style="text-align: center">No Record Found</td></tr>';
        }
        ?>
    </tbody>
</table>