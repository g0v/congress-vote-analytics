@extends('layout')

@section('content')
    <section class="district-list-block">
        <?php
        $districts = DB::table('districts')
                            ->orderBy('order', 'asc')
                            ->get();
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>選區</th>
                    <th>選區範圍</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($districts as $districts_obj) {
                ?>
                <tr>
                  <td><?php echo $districts_obj->order; ?></td>
                  <td><?php echo $districts_obj->title; ?></td>
                  <td><?php echo $districts_obj->description; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
@stop