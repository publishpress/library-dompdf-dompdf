# Prefixed Dompdf library for PublishPress

Prefixed build of [`dompdf/dompdf`](https://github.com/dompdf/dompdf) and its runtime dependency stack.
The `Dompdf` namespace becomes `PublishPress\Dompdf`.

The generated package also prefixes php-font-lib, php-svg-lib, Masterminds HTML5,
and Sabberworm CSS Parser so no upstream namespaces are registered by PublishPress
plugins.

## How to update the prefixed library

1. Change the pinned `dompdf/dompdf` version in `require-dev`.
2. Set `version` to the upstream version plus the next fourth digit.
3. Run `composer update` to rebuild `lib/` and the version loader.
4. Run `composer test:unit`, then `composer test:integration`.
5. Review and commit the generated code.
6. Create a GitHub release using the four-digit version so Packagist sees the tag.

Then update the plugins that consume `publishpress/dompdf-dompdf`.
