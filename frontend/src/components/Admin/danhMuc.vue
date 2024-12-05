<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card border-top border-0 border-4 border-primary shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h5>Thêm Mới Danh Mục</h5>
                </div>
                <div class="card-body">
                    <div class="mt-2">
                        <label>Tên Danh Mục</label>
                        <input tabindex="1" type="text" class="form-control mt-1">
                    </div>
                    <div class="mt-2">
                        <label>Slug Danh Mục</label>
                        <input type="text" class="form-control mt-1">
                    </div>
                    <div class="mt-2">
                        <label>Tình Trạng</label>
                        <select tabindex="2" class="form-control mt-1">
                            <option value="1">Hiển Thị</option>
                            <option value="0">Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label>Hình Ảnh Danh Mục</label>
                        <input tabindex="3" type="text" class="form-control mt-1">
                    </div>
                    <div class="mt-2">
                        <label>Danh Mục Cha</label>
                        <select tabindex="4" class="form-control mt-1">
                            <option value="0">Danh mục gốc</option>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="text-end">
                    <button class="btn btn-primary">Thêm Mới</button>
                    <button class="btn btn-danger" disabled>Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card border-top border-0 border-4 border-primary shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h5>Danh Sách Danh Mục</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle text-nowrap">
                                        #
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Tên Danh Mục
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Slug Danh Mục
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Tình Trạng
                                    </th>
                                    <th class="text-center align-middle text-nowrap">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="align-middle text-nowrap text-center"></th>
                                    <td class="align-middle text-nowrap"></td>
                                    <td class="align-middle text-nowrap"></td>
                                    <td class="align-middle text-nowrap text-center">
                                        <button class="btn btn-success">Hiển Thị</button>
                                        <button class="btn btn-warning">Tạm
                                            Tắt</button>
                                    </td>
                                    <td class="align-middle text-nowrap text-center">
                                        <button class="btn btn-primary me-1" data-bs-toggle="modal"
                                            data-bs-target="#updateModal">Cập Nhật</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">Xóa</button>
                                    </td>
                                </tr>
                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xác Nhận Xóa Danh
                                                    Mục
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div
                                                    class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 text-dark">Danger Alerts</h6>
                                                            <div class="text-dark">
                                                                Bạn có chắc chắn muốn xóa danh mục <b></b> này không?
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button data-bs-dismiss="modal" type="button" class="btn btn-danger">Xác
                                                    Nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Update -->
                                <div class="modal fade" id="updateModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Danh Mục
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mt-2">
                                                    <label>Tên Danh Mục</label>
                                                    <input tabindex="1" type="text" class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Slug Danh Mục</label>
                                                    <input type="text" class="form-control mt-1">
                                                </div>
                                                <div class="mt-2">
                                                    <label>Tình Trạng</label>
                                                    <select class="form-control mt-1">
                                                        <option value="1">Hiển Thị</option>
                                                        <option value="0">Tạm Tắt</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button disabled data-bs-dismiss="modal" type="button"
                                                    class="btn btn-danger">Xác Nhận</button>
                                                <button data-bs-dismiss="modal" type="button"
                                                    class="btn btn-success">Xác
                                                    Nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {

}
</script>
<style></style>