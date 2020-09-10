<?php

$page_title = '刪除';
require __DIR__ . '/parts/__connect_db.php';

$stmt = $pdo->query("SELECT * FROM `product` LIMIT 60");

?>
<?php require __DIR__ . '/parts/__html_head.php'; ?>
<?php include __DIR__ . '/parts/__navbar.php'; ?>
<style>
  .row {
    /* display:block;  */
    height: 90vh;
    /* margin: 0; */
  }

  .left {
    /* flex: 50%; */
    padding: 15px 0;
    width: 200px;
  }

  .left h2 {
    padding-left: 40px;
  }

  /* Style the navigation menu inside the left column */
  #Manager {
    list-style-type: none;
    padding: 50;
    margin: 0;
  }

  #Manager li a {
    padding: 10px;
    text-decoration: none;
    color: black;
    display: block
  }

  #Manager li a:hover {
    background-color: #eee;
    margin-right: 20px;
  }

  .list {
    width: 87vw;
    text-align: center;
  }

  .img-fluid {
    overflow: hidden;
  }

  .img-fluid {
    transform: scale(1, 1);
    transition: all .3s ease-out;
  }

  .img-fluid:hover {
    transform: scale(1.5, 1.5);
  }

  .button {

    cursor: pointer;
  }
  ul li {
    display: inline-block;
  }

  ul li:hover ul {
    display: block
  }

  ul li ul {

    display: none;
  }

  ul li ul li {
    display: block;
  }
</style>

<div class="row">
  <div class="left" style="background-color:#DCDCDC;">
    <h2>管理者</h2>
    <ul id="Manager">

      <li><a href="#">商品管理</a>
        <ul>
          <li><a href="#">商品分類</a>
          </li>
          <li><a href="http://localhost/mfee09/mfee09/test/product/upload.php">商品上架</a>
          </li>
          <li><a href="http://localhost/mfee09/mfee09/test/product/delete.php">商品下架</a>
          </li>
          <li><a href="http://localhost/mfee09/mfee09/test/product/update.php">商品更新</a>
          </li>
        </ul>
      </li>
      <li><a href="#">銷售管理</a></li>
      <li><a href="#">行銷活動</a></li>
      <li><a href="#">統計報表</a></li>
    </ul>
  </div>





  <!-- <div class="container"> -->
  <div class="list">
    <table class="table table-striped">
      <!-- `sid`, `name`, `email`, `mobile`, `birthday`, `address`, `created_at` -->
      <thead>

        <tr>
          <th scope="col">編號</th>
          <th scope="col">品名</th>
          <th scope="col">銷售</th>
          <th scope="col">價格</th>

        </tr>

      </thead>
      <tbody>
        <?php while ($r = $stmt->fetch()) : ?>
          <tr>
            <td><?= $r['sid'] ?></td>
            <td><?= $r['name'] ?></td>
            <td><?= $r['category'] ?></td>
            <td><?= $r['price'] ?></td>
            <td><?= $r['url'] ?></td>
            <td><img src="<?= WEB_ROOT ?>test/product/upload/<?= $r['img-name'] ?>" class="img-fluid " width="50" alt=""></td>
            <td><a href="javascript:delete_it(<?= $r['sid'] ?>)"><button type="button" class="btn btn-danger">刪除</button></a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include __DIR__ . '/parts/__scripts.php'; ?>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>
<?php include __DIR__ . '/parts/__scripts.php'; ?>

<script>
  function delete_it(sid) {
    if (confirm(`是否要刪除編號為 ${sid} 的資料???`)) {
      location.href = 'delete-api.php?sid=' + sid;
    }
  }
</script>
<?php include __DIR__ . '/parts/__html_foot.php'; ?>