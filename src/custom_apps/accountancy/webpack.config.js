// SPDX-FileCopyrightText: Nicolas DE GHESELLE <nicolas@degheselle.fr>
// SPDX-License-Identifier: AGPL-3.0-or-later
const webpackConfig = require('@nextcloud/webpack-vue-config')

webpackConfig.watchOptions =  {
    aggregateTimeout: 200,
    poll: 1000
}

module.exports = webpackConfig
