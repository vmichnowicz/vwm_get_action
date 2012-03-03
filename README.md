# VWM Get Action

VWM Get Action is a very simple ExpressionEngine 2 module that can retrieve action IDs and XIDs in EE templates. Instead of embedding PHP directly in your templates you can use some simple EE template code. This module came about when I was looking at how to create an [EE2 standalone registration form](http://expressionengine.com/wiki/EE2_Standalone_Registration_Form).

## License

VWM Get Action is licensed under the [Apache 2 License](http://www.apache.org/licenses/LICENSE-2.0.html).

## Support (in order of preference)

I provide the following support options:

* [GitHub Issue Tracker](https://github.com/vmichnowicz/vwm_get_action/issues)
* Devot:ee (coming soon)
* [Personal contact form](http://www.vmichnowicz.com/contact)
* [Twitter](http://twitter.com/vmichnowicz)

## Installation

Place module folder in `system/expressionengine/third_party/`. If you download the code directly off GitHub you may have to rename the folder manually to `vwm_get_action`.

## Example Code

### Get Action ID

The code below will retrieve the action ID for the `register_member` method of the `Member` module. This code will return something *like* `16`.

````
{exp:vwm_get_action:action_id module="Member" action="register_member"}{/exp:vwm_get_action:action_id}
````

### Get XID

The code below will return a fresh XID that looks something *like* `1ea31f51c87355007b818c64b232cc3123cd7cee`.

````
{exp:vwm_get_action:xid}{/exp:vwm_get_action:xid}
````