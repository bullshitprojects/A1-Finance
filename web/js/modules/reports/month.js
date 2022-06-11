import { generateReport, lastThreeMonthsPath, monthReportPath } from './utils.js'

export const lastThreeMonths = () => {
    const selector = '#lastThreeReport'

    const props = {
        selector,
        path: lastThreeMonthsPath,
    }

    generateReport(props)
}

export const monthReport = () => {
    const selector = '#monthReport'

    const props = {
        selector,
        path: monthReportPath,
    }

    generateReport(props)
}
