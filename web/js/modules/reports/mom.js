import { momPath, momDetailPath, generateReport } from './utils.js'

export const mom = () => {
    const momButton = '#momReport'
    const props = {
        selector: momButton,
        path: momPath,
    }

    generateReport(props)
}

export const momDetailed = () => {
    const momDetailedButton = '#momReportDetailed'

    const props = {
        selector: momDetailedButton,
        path: momDetailPath,
    }

    generateReport(props)
}
