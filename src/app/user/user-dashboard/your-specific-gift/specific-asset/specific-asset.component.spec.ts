import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SpecificAssetComponent } from './specific-asset.component';

describe('SpecificAssetComponent', () => {
  let component: SpecificAssetComponent;
  let fixture: ComponentFixture<SpecificAssetComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SpecificAssetComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SpecificAssetComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
