import { Controller } from "stimulus"

export default class extends Controller {

    static classes  = ['newColor'];

    changeTheme() {

        let bases = document.querySelectorAll("[class*=base-color-]");

        bases.forEach((element) => {

            let base = element.className.split("-").pop();

            if (base !== this.newColorClass) {

                element.className= 'row text-center base-color-' + this.newColorClass;

                let newColor = this.newColorClass;

                this.modifyClasses(base, '', '', newColor)

                this.modifyClasses(base, 'text-', '', newColor)

                this.modifyClasses(base, 'base-text-', '', newColor)

                this.modifyClasses(base, 'background-', '', newColor)

                this.modifyClasses(base, 'background-page-', '', newColor)

                this.modifyClasses(base, 'line-', '', newColor)

                this.modifyClasses(base, 'shadow-', '', newColor)

                this.modifyClasses(base, 'border-', '', newColor)

                this.modifyClasses(base, 'replace-', '', newColor)

                this.modifyClasses(base, 'replace-', '-icon', newColor)

                this.modifyClasses(base, 'hover-menu-', '', newColor)

                this.modifyClasses(base, '', '-icon', newColor)

                this.modifyClasses(base, 'button-', '', newColor)

                this.modifyClasses(base, '', '-title', newColor)

                this.modifyClasses(base, '', '-subtitle', newColor)

                this.modifyClasses(base, '', '-parallax', newColor)
                
                this.modifyClasses(base, '', '-scroll', newColor)
            }
        });
    }

    /**
     * @param base
     * @param prefix
     * @param suffix
     * @param newColor
     */
    modifyClasses(base, prefix, suffix, newColor) {

        let values = document.querySelectorAll('.' + prefix + base + suffix)

        values.forEach((el) => {
            el.classList.toggle(prefix + newColor + suffix);
            el.classList.toggle(prefix + base + suffix)
        });
    }

}