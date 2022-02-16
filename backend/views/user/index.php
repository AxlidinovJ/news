<div class="container-fluid">
    <table class="table table-hover table-border">
        <tr>
            <th>#</th>
            <th>FIO</th>
            <th>username</th>
            <th>img</th>
            <th>xolat</th>
        </tr>
      <?php $n=0; foreach($users as $user){ $n++?>
        <tr>
            <td><?=$n?></td>
            <td><?=$user->name?></td>
            <td><?=$user->username?></td>
            <td><?=$user->photo?></td>
            <td><?=$user->status?></td>
        </tr>
        <?php }?>
    </table>
</div>