<?php

$countries = $params['countries'];

?>

<div class="container pt-4">

    <div class="row justify-content-between">

        <div class="col-7">
            <div class="p-3 border rounded">

                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col" colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=0; $i<count($countries); $i++):?>
                            <tr>
                                <form method="post" action="country/edit">
                                    <th><?= $i+1?></th>
                                    <td>
                                        <input type="text" name="country" class="form-control" autocomplete="off" value="<?= $countries[$i]->getCountry()?>" required>
                                        <input type="hidden" name="id" value="<?= $countries[$i]->getId()?>">
                                    </td>
                                    <td class="pr-0 border-left">
                                        <input type="submit" class="btn btn-sm btn-primary" value="Save">
                                    </td>
                                </form>
                                <td class="pl-0">
                                    <form method="post" action="country/delete">
                                        <input type="hidden" name="id" value="<?= $countries[$i]->getId()?>">
                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php endfor;?>
                    </tbody>
                </table>

            </div>


        </div>

        <div class="col-4">

            <div class="p-3 border rounded">
                <form method="post" action="country/add">
                    <div class="form-row">
                        <div class="col-lg">
                            <label for="inputCountry">Country name</label>
                            <input type="text" class="form-control" id="inputCountry" name="country" placeholder="Enter country name" autocomplete="off" required>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add</button>
                </form>
            </div>
        </div>

    </div>

</div>
