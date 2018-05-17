import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { RealPropertyComponent } from './real-property.component';

describe('RealPropertyComponent', () => {
  let component: RealPropertyComponent;
  let fixture: ComponentFixture<RealPropertyComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RealPropertyComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RealPropertyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
