<?php

$countries = $params['countries'];
$users = $params['users'];

?>

<div class="container pt-4">

    <div class="row justify-content-between">

        <div class="col-9">
            <div class="p-3 border rounded">

                <table class="table table-striped">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Country</th>
                        <th scope="col" colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($i=0; $i<count($users); $i++):?>
                        <tr>
                            <form method="post" action="user/edit">
                                <input type="hidden" name="id" value="<?= $users[$i]->getId()?>">
                                <th><?= $i+1?></th>
                                <td>
                                    <input type="text" name="name" class="form-control" autocomplete="off" value="<?= $users[$i]->getName()?>" required>
                                </td>
                                <td>
                                    <input type="text" name="email" class="form-control" autocomplete="off" value="<?= $users[$i]->getEmail()?>" required>
                                </td>
                                <td>
                                    <select class="form-control" name="country_id" required>
                                        <option value=""></option>
                                        <?php for ($g=0; $g<count($countries); $g++){
                                            if (($countries[$g]->getId()) == ($users[$i]->getCountry_id()))
                                                echo "<option value=" . $countries[$g]->getId() . " selected>" . $countries[$g]->getCountry() . "</option>";
                                            else
                                                echo "<option value=" . $countries[$g]->getId() . ">" . $countries[$g]->getCountry() . "</option>";
                                        }?>
                                    </select>
                                </td>

                                <td class="pr-0 border-left">
                                    <input type="submit" class="btn btn-sm btn-primary" value="Save">
                                </td>
                            </form>
                            <td class="pl-0">
                                <form method="post" action="user/delete">
                                    <input type="hidden" name="id" value="<?= $users[$i]->getId()?>">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    <?php endfor;?>
                    </tbody>
                </table>

            </div>


        </div>

        <div class="col-3">

            <div class="p-3 border rounded">

                <form method="post" action="user/add">
                    <div class="form-row">
                        <div class="col-lg">
                            <label for="inputUserName">User name</label>
                            <input type="text" class="form-control" autocomplete="off" id="inputUserName" name="name" placeholder="Enter user name" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg">
                            <label for="inputEmail">Email address</label>
                            <input type="email" class="form-control" autocomplete="off" id="inputEmail" name="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg">
                            <label for="inputCountry">Select country</label>
                            <select class="form-control" id="inputCountry" name="country_id" required>
                                <option value=""></option>
                                <?php for ($i=0; $i<count($countries); $i++):?>
                                    <option value="<?= $countries[$i]->getId()?>"><?= $countries[$i]->getCountry()?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Add</button>
                </form>

            </div>
        </div>

    </div>

</div>

