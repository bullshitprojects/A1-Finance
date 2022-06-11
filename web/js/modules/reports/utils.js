export const momPath = 'mom-report.pdf'

export const lastThreeMonthsPath = 'last-three-months-report.pdf'

export const monthReportPath = 'month-report.pdf'

export const momDetailPath = 'mom-report-detailed.pdf'

export const generateReport = ({ selector, path }) => {
    $(selector).on('click', () => {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Reporte Generado Correctamente',
            showConfirmButton: false,
            timer: 1500,
        }).then(() => {
            const fullPath = `doc/${path}`

            const request = new XMLHttpRequest()
            request.open('GET', fullPath, true)
            request.responseType = 'blob'
            request.onload = () => {
                const blob = new Blob([request.response], { type: 'application/pdf' })
                const url = window.URL
                const link = url.createObjectURL(blob)
                const a = document.createElement('a')
                a.setAttribute('download', path)
                a.setAttribute('href', link)
                document.body.appendChild(a)
                a.click()
                document.body.removeChild(a)
            }

            request.send()
        })
    })
}
