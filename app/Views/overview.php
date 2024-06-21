<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('main') ?>
<h3 class="container">
    Avilable Conversion Minute
</h3>
<p class="container">
  20 Avilable conversion minutes for web <br>
  989 Avilable conversion minute for API <br>
  
</p>
<div class="container">
  <h3>
  Subscribtions
</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">PACKAGE</th>
      <th scope="col">NEXT RENEWAL</th>
      <th scope="col">PRICE</th>
      <th scope="col">STATUS</th>
      <th scope="col">AVILABLE MINUTES</th>
      <th scope="col">LastMETHOD</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td>API Subscription (100 Minutes)</td>
      <td>19 Jul 2024</td>
      <td>$8.00</td>
      <td>active</td>
      <td>989/1000</td>
      <td><p><a class="stripe" href="#">Stripe</a></p></td>
      <td>
        <button type="button" class="btn btn-primary">Upgrade</button>
        <button type="button" class="btn btn-danger">Cancel</button>
      </td>
      
    </tr>
    <tr>
     
      <td>Free(Web)</td>
      <td>21 Jun 2024</td>
      <td>$0</td>
      <td>Active</td>
      <td colspan="5">20/20</td>  
      <td><button type="button" class="btn btn-primary">Upgrade</button></td>
    </tr>
   
  </tbody>
</table>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>
