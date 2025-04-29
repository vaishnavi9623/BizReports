<div class="modal fade" id="printPdfModal" tabindex="-1" aria-labelledby="printPdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="printPdfForm">
        @csrf
        <div class="modal-content border-0 shadow-lg rounded-3">
          <div class="modal-header bg-primary text-white rounded-top">
            <h5 class="modal-title" id="printPdfModalLabel">
              <i class="fas fa-print me-2"></i> Print PDF
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
          <div class="modal-body bg-light">
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label for="printType" class="form-label fw-semibold">Select Type</label>
                <select name="type" id="printType" class="form-select shadow-sm" required>
                  <option value="">-- Choose --</option>
                  <option value="report">Report</option>
                  <option value="invoice">Invoice</option>
                </select>
              </div>
  
              <div class="col-md-6">
                <label class="form-label fw-semibold">Date Range</label>
                <div class="d-flex gap-2">
                  <input type="date" name="start_date" id="startDate" class="form-control shadow-sm" required>
                  <input type="date" name="end_date" id="endDate" class="form-control shadow-sm" required>
                </div>
              </div>
            </div>
  
            <div id="printableList" class="bg-white rounded p-3 shadow-sm border" style="max-height: 300px; overflow-y: auto;">
              <h6 class="fw-bold mb-3 text-primary">Select an Item to Print</h6>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="printItem" id="report1" value="Report 1">
                <label class="form-check-label w-100 border rounded p-2 d-flex justify-content-between align-items-center" for="report1">
                  Report 1 <span class="badge bg-secondary">2025-04-01</span>
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="printItem" id="report2" value="Report 2">
                <label class="form-check-label w-100 border rounded p-2 d-flex justify-content-between align-items-center" for="report2">
                  Report 2 <span class="badge bg-secondary">2025-04-05</span>
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="printItem" id="invoice1" value="Invoice A">
                <label class="form-check-label w-100 border rounded p-2 d-flex justify-content-between align-items-center" for="invoice1">
                  Invoice A <span class="badge bg-success">2025-04-06</span>
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="printItem" id="invoice2" value="Invoice B">
                <label class="form-check-label w-100 border rounded p-2 d-flex justify-content-between align-items-center" for="invoice2">
                  Invoice B <span class="badge bg-success">2025-04-10</span>
                </label>
              </div>
            </div>
          </div>
  
          <div class="modal-footer bg-white rounded-bottom">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              <i class="fas fa-times me-1"></i> Cancel
            </button>
            <button type="button" class="btn btn-primary" onclick="printSelectedContent()">
              <i class="fas fa-print me-1"></i> Print
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  