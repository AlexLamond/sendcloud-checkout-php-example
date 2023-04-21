function openServicePointPicker() {

    /**
   * @typedef {object} ServicePointPickerOptions
   * @property {string} apiKey Required. Set it to your API key.
   * @property {string} country Required. ISO-2 code of the country you want to display the map in.
   * @property {string} language Optional. Defaults to 'en-us'.
   * @property {string} postalCode Optional. Defaults to '' (empty string).
   * @property {string} city Optional. Defaults to '' (empty string).
   * @property {string} carriers Optional. Comma-separated list of carriers for which to filter service points. If not provided, the service points aren’t filtered.
   * @property {string} shopType Optional. Defaults to '' (empty string).
   * @property {number} servicePointId Optional. Set a pre-selected service point to be shown upon displaying the map.
   * @property {string} postNumber Optional. Set a pre-defined post number to fill its corresponding field upon displaying the map.
   */

  /** @type {ServicePointPickerOptions} */ const options = {
    apiKey: this.dc.apikey,
    country: this.dc.country,
    postalCode: this.dc.postal_code,
    city: this.dc.city,
    carriers: this.dc.carrier,
    language: "en-gb",
    }

    sendcloud.servicePoints.open(options, successCallback, failureCallback)
}

/**
 * Handles the selection of a service point.
 *
 * @param {ServicePoint} servicePoint
 * @param {string} postNumber Used as `to_post_number` field in the Parcel creation API
 */
function successCallback(servicePoint, postNumber) {
    servicePointResultElement.innerHTML = JSON.stringify(servicePoint, null, 2)
    resultPostNumberField.innerText = postNumber || '—'
    hljs.highlightElement(servicePointResultElement);
    document.body.classList.add('is-showing-api-result')
}

/**
 * Handles error events and closing the service point picker.
 *
 * @param {string[]} errors
 */
function failureCallback(errors) {
    document.body.classList.remove('is-showing-api-result')
    console.error('[Failure callback]', errors.join(', '))
}