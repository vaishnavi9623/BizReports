 <!-- Email Modal -->
 <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="emailForm" enctype="multipart/form-data" class="modal-content shadow-lg border-0 rounded-lg">
            @csrf
            <input type="hidden" name="report_id" id="modal_report_id">

            <div class="modal-header bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                <h5 class="modal-title" id="emailModalLabel">
                    <i class="fas fa-envelope me-2"></i>Send Email
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 py-3">
                <label for="type" class="form-label fw-semibold">Type <span class="text-danger">*</span></label>
                <select class="w-full mt-1 px-3 py-2 border border-gray-200 dark:border-gray-600 rounded text-sm">
                    <option>All Types</option>
                    <option>Report</option>
                    <option>Invoice</option>
                    <option>Ledger</option>
                </select>
            </div>
            <div class="modal-body px-4 py-3">
                <div class="mb-3">
                    <label for="to_email" class="form-label fw-semibold">To <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="to_email" name="to_email" placeholder="recipient@example.com" required>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="subject" name="subject" rows="3" placeholder="Enter subject here..." required></textarea>
                </div>

                <div class="mb-3">
                    <label for="attachment" class="form-label fw-semibold">Attachment</label>
                    <input type="file" class="form-control" id="attachment" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx">
                    <small class="text-muted">Optional – only PDF, DOC, DOCX, XLS, XLSX supported</small>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-between px-4 py-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-1"></i>Send Email
                </button>
            </div>
        </form>
    </div>
</div>