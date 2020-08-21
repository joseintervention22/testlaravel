<template>
<div>
<select id="menu" class="form-control">
   <option value="1">activos</option>
   <option value="2">inactivos</option>
   <option value="3">todos</option>
</select>
    <table class="table table-striped table-hover" id="users-table">
        <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">status</th>
    </tr>
  </thead>
 <!--
    <tr v-for="user in users">
      <th scope="row">{{user.id}}</th>
      <td>{{user.name}}</td>
      <td>{{user.email}}</td>
      <td>{{user.status}}</td>
    </tr>
   -->

    </table>



</div>
</template>

<script>
$(document).ready(function() {
    $('#menu').change(function() { 
       if($('#menu option:selected').val() == 2) { 
           deshabilitados();
       } 
    });
     $('#menu').change(function() { 
       if($('#menu option:selected').val() == 1) { 
           habilitados();
       } 
    });
    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: {
            url: "/users/list",
            dataSrc: "data",
            type: "GET"
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'status' }
        ]
    });

    function deshabilitados(){
        var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        "bDestroy": true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: {
            url: "/users/disabled",
            dataSrc: "data",
            type: "GET"
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'status' }
        ]
    });
    
    }
    function habilitados(){
        $("#users-table").dataTable().fnDestroy();
        var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        ajax: {
            url: "/users/enabled",
            dataSrc: "data",
            type: "GET"
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'status' }
        ]
    });
    
    }
});

</script>
