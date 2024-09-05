<footer class="sticky-footer bg-white">
  <div class="container my-auto">
      <div class="copyright text-center my-auto">
          <span>Copyright &copy; Course<sup>shop</sup> 2024</span>
      </div>
  </div>
</footer>
</div>
</div>
</section>
@if(Request::routeIs('admin.index'))
  <script>const monthlyPurchaseData = {!! $monthly_purchase_data !!};</script>
@endif
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.js') }}"></script>
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@if(Request::routeIs(['purchase-data', 'user-data']))

  <script src="{{ asset('"vendor/datatables/jquery.dataTables.min.js"') }}"></script>
  <script src="{{ asset('"vendor/datatables/dataTables.bootstrap4.min.js"') }}"></script>
  <script src="{{ asset('"js/demo/datatables-demo.js"') }}"></script>

@endif
</body>
</html>