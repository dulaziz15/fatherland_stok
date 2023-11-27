<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Fatherland Stok</h5>
                <p>kostumisasi tampilan</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger"
                        onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidebar</h6>
                <p class="text-sm">Pilih salah satu tipe tampilan sidebar</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                    onclick="sidebarType(this)">Transparan</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                    onclick="sidebarType(this)">Putih</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">ubah tampilan Navbarmu</p>
            <!-- Navbar Fixed -->
            <div class="mt-3">
                <h6 class="mb-0">Navbar tetap</h6>
            </div>
            <div class="form-check form-switch ps-0">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                    onclick="navbarFixed(this)">
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- preview image --}}
<script>
    function confirmDelete(data) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: `Anda ingin menghapus data ${data}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus data!',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            } else {
                Swal.fire('Cancelled', 'Your action has been cancelled', 'info');
            }
        });
    }

    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }

    function clearImage() {
        document.getElementById('formFile').value = null;
        frame.src = "";
    }
    // show form add Report
    function addReport() {
        const form = $('#formReport');
        if (form.is(':visible')) {
            form.fadeOut();
        } else {
            form.fadeIn();
        }
    }
</script>
{{-- show password --}}
<script>
    function showPassword() {
        var x = document.getElementById("inputPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#fff",
                data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 15,
                        font: {
                            size: 14,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false
                    },
                    ticks: {
                        display: false
                    },
                },
            },
        },
    });
</script>
@if (request()->routeIs('dashboard'))
    <script>
        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors
        function randomColor() {
            // Menghasilkan nilai warna acak dalam format HEX (#xxxxxx)
            return '#' + Math.floor(Math.random() * 16777215).toString(16);
        }
        const piscok = {!! json_encode($piscok) !!};
        // Membuat array kosong untuk menyimpan datasets
        const datasets = [];
        let maxLength = 0;
        const penjualan = [];
        for (const key in piscok) {
            if (Object.hasOwnProperty.call(piscok, key)) {
                const item = piscok[key];
                // console.log(item);

                const jumlahArray = [];

                for (const barang in item) {
                    if (item.hasOwnProperty(barang) && item[barang].hasOwnProperty('jumlah')) {
                        jumlahArray.push(item[barang].jumlah);
                        const createdDateString2 = item[barang].created_at;
                        const parsedDate2 = new Date(createdDateString2);
                        const day2 = parsedDate2.getDate();
                        const month2 = parsedDate2.toLocaleString('default', {
                            month: 'short'
                        });
                        penjualan.push(`${day2} ${month2}`);
                    }
                }

                const newDataset = {
                    label: item[0]['stand']['pegawai'],
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: randomColor(),
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: jumlahArray,
                    maxBarThickness: 6
                };

                datasets.push(newDataset);

                maxLength = Math.max(maxLength, jumlahArray.length);
            }
        }

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: penjualan,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var ctx5 = document.getElementById("chart-line-2").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors
        function randomColor() {
            // Menghasilkan nilai warna acak dalam format HEX (#xxxxxx)
            return '#' + Math.floor(Math.random() * 16777215).toString(16);
        }
        const brownis = {!! json_encode($brownis) !!};
        // Membuat array kosong untuk menyimpan datasets
        const data = [];
        let maksimal = 0;
        const tanggal = [];
        for (const index in brownis) {
            if (Object.hasOwnProperty.call(brownis, index)) {
                const buah = brownis[index];
                console.log(buah);

                const jumlahArray = [];

                for (const barang in buah) {
                    if (buah.hasOwnProperty(barang) && buah[barang].hasOwnProperty('jumlah')) {
                        jumlahArray.push(buah[barang].jumlah);
                        const createdDateString = buah[barang].created_at;
                        const parsedDate = new Date(createdDateString);
                        const day = parsedDate.getDate();
                        const month = parsedDate.toLocaleString('default', {
                            month: 'short'
                        });
                        tanggal.push(`${day} ${month}`);
                    }
                }

                const newDataset = {
                    label: buah[0]['stand']['pegawai'],
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: randomColor(),
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: jumlahArray,
                    maxBarThickness: 6
                };

                data.push(newDataset);

                maksimal = Math.max(maksimal, jumlahArray.length);
            }
        }

        const labels2 = Array.from({
            length: maxLength
        }, (_, index) => `Penjualan ${index + 1}`);

        new Chart(ctx5, {
            type: "line",
            data: {
                labels: tanggal,
                datasets: data
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endif
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
