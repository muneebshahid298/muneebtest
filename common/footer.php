
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<script type="text/javascript">

	function del(x,y) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won’t be able to reverse this !",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#bab8b8',
			confirmButtonText: 'Yes, Delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				x(y);
			}
		})
	}



	function accept(x,y) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won’t be able to reverse this !",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#bab8b8',
			confirmButtonText: 'Yes, Mark it!'
		}).then((result) => {
			if (result.isConfirmed) {
				x(y);
			}
		})
	}



	function cancel(x,y) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won’t be able to reverse this !",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#bab8b8',
			confirmButtonText: 'Yes, Mark it!'
		}).then((result) => {
			if (result.isConfirmed) {
				x(y);
			}
		})
	}

</script>




</body>
</html>